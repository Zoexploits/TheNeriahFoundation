
@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Sliders</h1>
            <a href="{{ route('admin_slider_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Heading</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider  )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/'.
                                                    $slider->slider_photo) }}" class="w_200">
                                                </td>
                                                <td>{{$slider->heading}}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{route('admin_slider_edit',$slider->id)}}" class="btn btn-primary" ><i class="fas
                                                        fa-edit"></i></a>
                                                        <a href="" class="btn btn bg-danger" onclick="return
                                                        confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                        </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
