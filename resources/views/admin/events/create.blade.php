@extends('admin.layouts.dashboard-layout')

@section('title', 'Create Event')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create Event
                </h3>
            </div>
        </div>

        @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>
                    {{-- <strong>Snap! </strong>You should check in on some of those fields below. --}}
                        @foreach ($errors->all() as $error)
                                {{ $error }}
                        @endforeach
                </div>
        @endif



        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('admin.events.post') }}" enctype="multipart/form-data">

            @csrf

            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Name Of Event:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name Of Event">
                    </div>
                    <div class="col-md-6">
                        <label>Motto:</label>
                        <input type="text" class="form-control" name="motto" placeholder="Enter Event Motto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Event Description:</label>
                        <textarea class="form-control" name="description" placeholder="Enter Event Description"></textarea>
                    </div>
                </div>
                 <div class="form-group row">
                    <div class="col-md-6">
                        <label>Event Banner:</label>
                        <input type="file" class="form-control" name="event_banner" placeholder="Enter Name Of Event">
                    </div>
                    <div class="col-md-6">
                        <label>Venue:</label>
                        <input type="text" class="form-control" name="venue" placeholder="Enter Venue Of Event">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Date Of Event:</label>
                        <input type="date" class="form-control" name="starts" placeholder="Enter Date Of Event">
                    </div>
                    <div class="col-md-6">
                        <label>End Date Of Event (leave blank if one day event):</label>
                        <input type="date" class="form-control" name="ends" placeholder="Enter Venue Of Event">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Time Of Event:</label>
                        <input type="time" class="form-control" name="time" placeholder="Enter Time Of Event">
                    </div>
                    <div class="col-md-6">
                        <label>Country:</label>
                        <select class="form-control" name="country">
                            <option value=""> -- Select Country -- </option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Canada">Canada</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--solid">
                <div class="kt-form__actions kt-form__actions--center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>

@endsection

@section('scripts')
<script>

    $(document).ready(function () {

        @if(Session::has('success'))
            Swal.fire(
                'Success!',
                '{{Session::get('success')}}',
                'success'
            )
            console.log('Hi')
        @endif
    });

</script>
@endsection
