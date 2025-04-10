
@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Create Sliders</h1>
            <a href="{{ route('admin_slider_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('admin_slider_edit_submit',$slider->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3"></div>
                                        <label for="">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{slider->heading}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Text</label>
                                        <textarea name="text" id="" cols="30" rows="10" class="form-control editor">{{$slider->text}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" value="{{$slider->button_text}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{$slider->button_link}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Existing Photo</label>
                                        <div class="">
                                            <img src="{{asset('uploads/'.$slider->photo)}}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Change Photo</label>
                                        <div class="">
                                            <input type="file" name="photo">
                                        </div>
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
