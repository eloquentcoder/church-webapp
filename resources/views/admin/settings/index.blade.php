@extends('admin.layouts.dashboard-layout')

@section('title', 'Settings')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Settings
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
        <form class="kt-form" action="{{ route('admin.settings.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>About Pastor:</label>
                        <textarea class="form-control" name="about_pastor" rows="4">{{ $setting->about_pastor ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label>About Church:</label>
                        <textarea class="form-control" name="about_church" rows="4">{{ $setting->about_church ?? '' }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Upload Homepage Sermon Clip:</label>
                        <input type="file" class="form-control" name="sermon_clip">
                    </div>
                    <div class="col-md-6">
                        <label>Sermon Clip Title:</label>
                    <input type="text" class="form-control" name="sermon_clip_title" value="{{ $setting->sermon_clip_title ?? '' }}" placeholder="Enter Sermon Clip Title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Enter Phone Number:</label>
                        <input type="tel" class="form-control" name="phone_number" value="{{ $setting->phone_number ?? '' }}" placeholder="Enter Official Phone Number">
                    </div>
                    <div class="col-md-6">
                        <label>Enter Alternate Phone Number:</label>
                    <input type="tel" class="form-control" name="alt_number" value="{{ $setting->alt_number ?? '' }}" placeholder="Enter Alternate Phone Number">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Enter Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $setting->email ?? '' }}" placeholder="Enter Email Address">
                    </div>
                    <div class="col-md-6">
                        <label>Enter Ministry Address:</label>
                    <input type="text" class="form-control" name="address" value="{{ $setting->address ?? '' }}" placeholder="Enter Ministry Address">
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
