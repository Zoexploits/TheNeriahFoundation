@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Edit Cause</h1>
            <a href="{{ route('admin_cause_index') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin_cause_edit_submit',$cause->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $cause->name }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{$cause->slug}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Short Description</label>
                                        <textarea name="short_description" class="form-control" rows="3" required>{{$cause->short_description}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Full Description</label>
                                        <textarea name="description" class="form-control editor" rows="6" >{{$cause->description}}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Goal Amount (₦)</label>
                                        <input type="number" class="form-control" name="goal" value="{{ $cause->goal}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Raised Amount (₦)</label>
                                        <input type="number" class="form-control" name="raised" value="{{ $cause->raised}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Existing Photo</label>
                                        <div class="">
                                            <img src="{{asset('uploads/'.$cause->featured_photo)}}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="">Change Photo</label>
                                        <input type="file" name="featured_photo" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Cause</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
