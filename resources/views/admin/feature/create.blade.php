
@extends('admin.layouts.app')

@section('main_content')

<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Create Feature</h1>
            <a href="{{ route('admin_feature_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('admin_feature_create_submit')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3"></div>
                                        <label for="">Heading</label>
                                        <input type="text" class="form-control" name="heading" >
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Text</label>
                                        <textarea name="text" id="" cols="30" rows="10" class="form-control editor"></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
