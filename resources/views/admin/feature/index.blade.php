
@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Features</h1>
            <a href="{{ route('admin_feature_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                            <th>Icon</th>
                                            <th>Heading</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($features as $feature)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>l
                                                <td>
                                                    <i class="{{$feature->icon}}" style="font-size:30px"></i>
                                                </td>
                                                <td>{{$feature->heading}}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{route('admin_feature_edit',$slider->id)}}" class="btn btn-sm btn-primary" ><i class="fas
                                                        fa-edit"></i></a>
                                                        <a href="{{route('admin_feature_delete',$slider->id)}}" class="btn btn bg-danger btn-sm" onclick="return
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
