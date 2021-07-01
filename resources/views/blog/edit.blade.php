@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4>
                            Edit Posts
                            <a href="{{url('posts')}}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" name="description" rows="3">{!! $post->description !!}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Image (File Upload)</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {!! $post->title == 1 ? 'checked': '' !!}> 0 = show, 1 = hidden
                            </div>

                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
