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
                            Add Posts
                            <a href="{{url('posts')}}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('posts')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" name="description" required rows="3"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Image (File Upload)</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status"> 0 = show, 1 = hidden
                            </div>

                            <div class="form-group mb-3">
                               <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
