@extends('admin.layouts.dashboard-layout')

@section('title', 'Add Members')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Member
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
        <form class="kt-form" method="POST" action="{{ route('admin.members.create.post') }}" enctype="multipart/form-data">

            @csrf

            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                    </div>
                    <div class="col-md-6">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Phone Number:</label>
                        <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-md-6">
                        <label>Address:</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>City:</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter City">
                    </div>
                    <div class="col-md-6">
                        <label>State:</label>
                        <input type="text" class="form-control" name="state" placeholder="Enter State">
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
