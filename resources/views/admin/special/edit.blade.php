
@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Edit Special</h1>
            {{-- <a href="{{ route('admin_slider_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a> --}}
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('admin_special_edit_submit', )}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3"></div>
                                        <label for="">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{$special->heading}}">
                                    </div>
                                    <div class="form-group mb-3"></div>
                                        <label for="">Sub Heading</label>
                                        <input type="text" class="form-control" name="sub_heading" value="{{$special->sub_heading}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Text</label>
                                        <textarea name="text" id="" cols="30" rows="10" class="form-control editor" >{{$special->text}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" value="{{$special->button_text}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{$special->button_link}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Video Id</label>
                                        <input type="text" class="form-control" name="video_id" value="{{$special->video_id}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Existing Photo</label>
                                        <div class="">
                                            <img src="{{asset('uploads/'.$special->photo)}}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Change Photo</label>
                                        <div class="">
                                            <input type="file" name="photo">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-select">
                                            <option value="show" @if($special->status == 'show') selected @endif >Show</option>
                                            <option value="hide" @if($special->status == 'hide') selected @endif >Hide</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
