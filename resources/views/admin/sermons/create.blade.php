@extends('admin.layouts.dashboard-layout')

@section('title', 'Create Sermon')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create Sermon
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form" action="{{ route('admin.sermons.create.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Title Of Sermon:</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title Of Sermon" value="{{ old('title') }}">
                    </div>
                    <div class="col-md-6">
                        <label>Bible Text:</label>
                        <input type="text" class="form-control" name="bible_text" placeholder="Enter Bible Text" value="{{ old('bible_text') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Link To Audio File:</label>
                        <input type="text" class="form-control" name="audio" placeholder="Enter Audio File Link">
                    </div>
                    <div class="col-md-6">
                        <label>Link To Video File:</label>
                        <input type="text" class="form-control" name="video" placeholder="Enter Video File Link">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Published Date:</label>
                        <input type="date" class="form-control" name="published_date" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Message:</label>
                        <textarea class="form-control" rows="4" name="message" placeholder="Enter Message"></textarea>
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
