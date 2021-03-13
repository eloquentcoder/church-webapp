@extends('admin.layouts.dashboard-layout')

@section('title', 'Edit Post')

@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit Post
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
        <form class="kt-form" method="POST" action="{{ route('admin.blog-post.update', $post->id) }}" enctype="multipart/form-data">

            @csrf

            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Title Of Post:</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter Title Of Post">
                    </div>
                    <div class="col-md-6">
                        <label>Post Image:</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter Venue Of Event">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Blog Post:</label>
                        <textarea class="form-control" name="post" placeholder="Enter Blog Post" rows="4">{{ $post->post }}</textarea>
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
