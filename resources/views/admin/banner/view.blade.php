@extends('admin.layouts.admin')
@section('title', 'List of Slider')
<link href="{{ asset('public/back/assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@section('content')
    <div class="page-title-box">
            <div class="container-fluid">
                <section class="py-2">
                    <div class="container">
                        <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Banner
                                Sliders</strong><button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ route('admin.add_banner') }}"
                                    style="font-weight:600;">Add new banner</a>
                            </button>
                        </p>
                    </div>
                </section>
                <div class="row">
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Success! - </strong> {{ session('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Banner name</th>
                                                    <th>Description</th>
                                                    <th>Banner Link</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $i = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($bannersData as $lists)
                                                    <tr>
                                                        {{-- <td>{{$lists->image }}</td> --}}
                                                        <td><img src="{{ asset('public/storage/media/banner/slider/'.$lists->image) }}" width="50px" alt="img"></td>
                                                        <td>{{ $lists->name }}</td>
                                                        <td>{{ $lists->desc }}</td>
                                                        <td>{{ $lists->banner_link }}</td>
                                                        <td>
                                                            @if ($lists->status == 1)
                                                                <a href="{{ route('admin.banner_status', $lists->id) }}">
                                                                    <button type="button" class="btn btn-info"><i
                                                                            class="mdi mdi-toggle-switch"></i>
                                                                    </button></a>
                                                            @elseif($lists->status == 0)
                                                                <a href="{{ route('admin.banner_status', $lists->id) }}">
                                                                    <button type="button" class="btn btn-warning"><i
                                                                            class="mdi mdi-toggle-switch-off"></i></button></a>
                                                            @endif
                                                        </td>
                                                        <td class="col-mb-1 d-flex d-inline-block gap-1"><a
                                                                href="{{ route('admin.edit_process', $lists->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-success custom-list-button">
                                                                    <i class="mdi mdi-grease-pencil"></i></button></a>
                                                            {{-- <a href="{{route('admin.delete_banner',$lists->id)}}">
                                                        <button type="button" class="btn btn-danger custom-list-button m-1">
                                                            <i class="mdi mdi-delete"></i></button></a> --}}
                                                            <form method="POST"
                                                                action="{{ route('admin.delete_banner', $lists->id) }}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit"
                                                                    class="btn btn-xs btn-danger show-alert-delete-box"
                                                                    data-toggle="tooltip" title='Delete'><i
                                                                        class="mdi mdi-delete"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- end preview-->
                                </div> <!-- end tab-content-->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->
            </div> <!-- container -->    
        <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>       
        <script src="{{ asset('public/back/assets/js/sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            $('.show-alert-delete-box').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: "Are you sure you want to delete this record?",
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    type: "warning",
                    buttons: ["Cancel", "Yes!"],
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        </script>
    </div>

@endsection
