<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Event;
use App\Member;
use App\Sermon;
use App\Setting;
use App\Donation;
use App\Testimony;
use App\Subscriber;
use App\PrayerRequest;
use Illuminate\Http\Request;
use App\Http\Helpers\Currency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Mail\SendNewsletter;
use App\Newsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DashboardController extends BaseController
{


    public function __construct()
    {
        $this->middleware('registered');
    }

    public function index()
    {
        $this->donations = Currency::moneyFomatter(Donation::pluck('amount')->sum());
        $this->members = Member::all();
        $this->subscribers = Subscriber::all();
        $this->prayer_requests = PrayerRequest::all();
        $this->posts = Post::all();
        $this->recent_testimonies = Testimony::orderBy('created_at')->paginate(5);
        return view('admin.dashboard.index', $this->data);
    }

    public function showEventsPage()
    {
        $this->events = Event::all();
        return view('admin.events.index', $this->data);
    }

    public function createEventPage()
    {
        return view('admin.events.create');
    }

    public function postEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'motto' => ['required'],
            'event_banner' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'starts' => ['required'],
            'description' => ['required'],
            'time' => ['required'],
            'venue' => ['required'],
            'country' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if ($files = $request->file('event_banner')) {
            $destinationPath = 'uploads/events/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }

         $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

         $event = new Event();
         $event->name  = $request->name;
         $event->slug = $slug;
         $event->motto  = $request->motto;
         $event->starts  = $request->starts;
         $event->description  = $request->description;
         $event->ends  = $request->ends;
         $event->time  = $request->time;
         $event->venue  = $request->venue;
         $event->country  = $request->country;
         $event->image  = $profileImage;
         $event->save();


        return redirect()->back()->with('success', 'Event Created Successfully');
    }

    public function editEventPage($id)
    {
        $this->event = Event::find($id);
        return view('admin.events.edit', $this->data);
    }

    public function updateEvent(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'motto' => ['required'],
            'event_banner' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            // 'starts' => ['required'],
            'description' => ['required'],
            'time' => ['required'],
            'venue' => ['required'],
            'country' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if ($files = $request->file('event_banner')) {
            $destinationPath = 'uploads/events/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }

         $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

         $event = Event::find($id);
         $event->name  = $request->name;
         $event->slug = $slug;
         $event->motto  = $request->motto;

         if ($request->starts) {
            $event->starts  = $request->starts;
         }
         $event->description  = $request->description;

         if ($request->ends) {
            $event->ends  = $request->ends;
         }

         $event->time  = $request->time;
         $event->venue  = $request->venue;
         $event->country  = $request->country;

         if ( $request->file('event_banner')) {
            $event->image  = $profileImage;
         }

         $event->update();


        return redirect()->route('admin.events')->with('success', 'Event Updated Successfully');

    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event Deleted Successfully');
    }

    public function showPrayerRequestsPage()
    {
        $this->prayer_requests = PrayerRequest::all();
        return view('admin.prayer-requests.index', $this->data);
    }

    public function showTestimoniesPage()
    {
        $this->testimonies = Testimony::all();
        return view('admin.testimonies.index', $this->data);
    }

    public function showCreateTestimony()
    {
        return view('admin.testimonies.create');
    }

    public function postTestimony(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'name' => ['required'],
            'phone_number' => ['required'],
            'testimony' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $testimony = Testimony::create($request->all());
        return redirect()->route('admin.testimonies')->with('success', 'Testimony Created Successfully');
    }

    public function deleteTestimony($id)
    {
        $post = Testimony::find($id);
        $post->delete();

        return redirect()->route('admin.testimonies')->with('success', 'Testimony Deleted Successfully');
    }

    public function showBlogPostsPage()
    {
        $this->blogposts = Post::all();
        return view('admin.blog-posts.index', $this->data);
    }

    public function createPostPage()
    {
        return view('admin.blog-posts.create');
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'post' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if ($files = $request->file('image')) {
            $destinationPath = 'uploads/posts/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $request->request->add(['slug' => $slug]);
        $request->request->add(['image' => $profileImage]);

        $post = Post::create($request->all());
        return redirect()->route('admin.blog-posts')->with('success', 'Post Created Successfully');

    }

    public function editPostPage($id)
    {
        $this->post = Post::find($id);
        return view('admin.blog-posts.edit', $this->data);
    }

    public function updatePost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'post' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if ($files = $request->file('image')) {
            $destinationPath = 'uploads/posts/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }



        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $post = Post::find($id);
        $post->title = $request->title;
        $post->post = $request->post;
        $post->update();

        return redirect()->route('admin.blog-posts')->with('success', 'Post Updated Successfully');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.blog-posts')->with('success', 'Post Deleted Successfully');
    }


    public function showSermonsPage()
    {
        $this->sermons = Sermon::all();
        return view('admin.sermons.index', $this->data);
    }

    public function createSermonsPage()
    {
        return view('admin.sermons.create');
    }

    public function postSermon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'bible_text' => ['required'],
            'message' => ['required'],
            'published_date' => ['required'],
            'audio' => ['nullable', 'url'],
            'video' => ['nullable', 'url']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $uploaded_video = $request->video;
        $new_linked_video = str_replace('watch', 'embed', $uploaded_video);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        $request->request->add(['slug' => $slug]);
        $request->request->add(['video' => $new_linked_video]);
        $sermon = Sermon::create($request->all());
        return redirect()->route('admin.sermons')->with('success', 'Sermon Created Successfully');

    }

    public function settingsPage()
    {
        $this->setting = Setting::first();
        return view('admin.settings.index', $this->data);
    }

    public function postSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_pastor' => ['required'],
            'about_church' => ['required'],
            'sermon_clip' => ['required', 'file', 'mimes:audio/mpeg,mpga,mp3,wav,aac'],
            'sermon_clip_title' => ['required'],
            'phone_number' => ['required'],
            'alt_number' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if ($files = $request->file('sermon_clip')) {
            $destinationPath = 'uploads/audio/'; // upload path
            $clip = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $clip);
         }

         $first_setting = Setting::first();

         if($first_setting){
            $first_setting->delete();
         }

         $setting = new Setting();
         $setting->about_pastor = $request->about_pastor;
         $setting->about_church = $request->about_pastor;
         $setting->sermon_clip = $clip;
         $setting->sermon_clip_title = $request->sermon_clip_title;
         $setting->alt_number = $request->alt_number;
         $setting->phone_number = $request->phone_number;
         $setting->email = $request->email;
         $setting->address = $request->address;
         $setting->save();



        return redirect()->route('admin.dashboard')->with('success', 'Setting Updated Successfully');

    }

    public function getMembersPage()
    {
        $this->members = Member::all();
        return view('admin.members.index', $this->data);
    }

    public function createMemberPage()
    {
        return view('admin.members.create');
    }

    public function postMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required', 'file'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $member = Member::create($request->all());
        return redirect()->route('admin.members')->with('success', 'Member Created Successfully');

    }

    public function getNewsLetterPage()
    {
        $this->suscribers = Subscriber::all();
        return view('admin.newsletter.index', $this->data);
    }

    public function sendNewsletterPage()
    {
        return view('admin.newsletter.send');
    }

    public function sendNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $newletter = Newsletter::create($request->all());

        $subscriber_emails = Subscriber::select('email')->get();

        Mail::to($subscriber_emails)->send(new SendNewsletter($newletter));

        return redirect()->route('admin.newsletter')->with('success', 'Newsletter Sent Successfully');

    }


}
