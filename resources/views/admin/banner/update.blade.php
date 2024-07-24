@extends('admin.layouts.admin')
@section('title','Home Banner')
@section('content')
<div class="page-title-box">
    <section class="py-2">
        <div class="container">
            <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Home Banner</strong><button class="btn btn-primary float-end">
                    <a class="float-end text-white" href="{{ route('admin.view_banner') }}" style="font-weight:600;">Back to
                        Lists</a>
                </button>
            </p>
        </div>
    </section>
    <section class="exporter-section">
        @if (session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif
        <form class="py-1 mb-5" action="{{url('admin/banner/update-process')}}/{{$edit_banner->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card ">
                <div class="card-body">
                    <h4 class="header-title">Banner Slider</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{$edit_banner->name}}" class="form-control"/>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{$edit_banner->slug}}" class="form-control" />
                                @if($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="banner_link" class="form-label">Banner Link</label>
                                <input type="text" name="banner_link" value="{{$edit_banner->banner_link}}" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="desc" class="form-label py-1">Description</label>
                                <input type="text" name="desc" value="{{$edit_banner->desc}}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image" class="form-label py-1">Upload Image</label>
                                <input type="file" name="image" value="{{$edit_banner->image}}" class="form-control" />
                                <img src="{{ asset('storage/media/banner/slider/'.$edit_banner->image) }}" width="50px" alt="img">
                                @if($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Update Banner</button>
                </div>
            </div>
        </form>
    </section>
@endsection