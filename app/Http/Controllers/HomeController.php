<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Sermon;
use App\Inquiry;
use App\Setting;
use App\Testimony;
use Carbon\Carbon;
use App\Newsletter;
use App\Subscriber;
use App\Reservation;
use App\PrayerRequest;
use App\Mail\ReserveSeat;
use Illuminate\Http\Request;
use App\Http\Helpers\UniqueNumber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $this->upcoming_events = Event::where('starts', '>', $today)->oldest()->paginate(3);
        $this->events = Event::where('starts', '>', $today)->get();

        $this->messages = Sermon::orderBy('created_at')->paginate(3);
        $this->setting = Setting::first();

        // dd($this->setting->sermon_clip);


        return view('home.index', $this->data);

    }

    public function showAboutPage()
    {
        $this->setting = Setting::first();
        $this->events = Event::all();
        $this->countries = Event::select('country')->distinct()->get();
        return view('home.about', $this->data);
    }

    public function showEventsPage()
    {
        $today = new Carbon();

        $this->upcoming_events = Event::where('starts', '>', $today)->get();
        $this->past_events = Event::where('starts', '<', $today)->get();
        return view('home.events.index', $this->data);
    }


    public function viewEventPage($slug)
    {
        $this->event = Event::where('slug', $slug)->first();
        return view('home.events.view', $this->data);
    }

    public function showReserveSeatPage($id)
    {
        $this->event = Event::find($id);
        return view('home.events.reserve-seat', $this->data);
    }

    public function postReservations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'address' => ['required']
        ]);

        if ($validator->fails()) {
                return redirect()->back()->with('errors', $validator->errors());
        }

        $ticket_pass = UniqueNumber::uniqueTicketNo();

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone_number = $request->phone_number;
        $reservation->email = $request->email;
        $reservation->address = $request->address;
        $reservation->unique_pass = $ticket_pass;
        $reservation->event_id = $request->event_id;
        $reservation->save();
        // $event->reservations->create($request->all());

        $event = Event::find($reservation->event_id);

        Mail::to($request->email)->send(new ReserveSeat($reservation, $event));

        return redirect()->route('events')->with('success', 'Seat Reserved Successfully. Please Check Your Mail For Ticket Pass');
    }

    public function showSermonsPage()
    {
        $this->messages = Sermon::all();
        return view('home.sermons.index', $this->data);
    }

    public function viewSermonPage($slug)
    {
        $this->sermon = Sermon::where('slug', $slug)->first();
        return view('home.sermons.view', $this->data);
    }

    public function showTestimoniesPage()
    {
        $this->testimonies = Testimony::all();
        return view('home.testimonies.index', $this->data);
    }

    public function makeTestimonyPage()
    {
        return view('home.testimonies.create');
    }

    public function prayerRequest(Request $request)
    {
        $prayer_request = PrayerRequest::create($request->all());

        if($prayer_request)
        {
            return redirect()->route('prayer-request')->with('success', 'Request Submitted Successfully');
        }

    }

    public function showContactPage()
    {
        $this->setting = Setting::first();
        return view('home.contact', $this->data);
    }

    public function postContact(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->message = $request->message;
        $inquiry->save();

        return redirect()->route('contact')->with('success', 'Form Submitted Successfully');
    }

    public function showDonationsPage()
    {
        return view('home.donation');
    }

    public function showPrayerRequestPage()
    {
        return view('home.prayer-requests');
    }

    public function newsletter(Request $request)
    {
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response()->json(['success', 'You have successfully subscribed to our newsletter']);
    }

}
