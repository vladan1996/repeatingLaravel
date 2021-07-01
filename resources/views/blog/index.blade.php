@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                    @endif
                    <div class="card-header">
                        Posts
                        <a href="{{url('posts/create')}}" class="btn btn-primary float-end">Add Posts</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->users->name}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <img style="width: 80px; height: 80px" src="{{asset('uploads/blog/'.$item->image)}}" alt="{{$item->image }}">
                                    </td>
                                    <td>
                                        @if($item-> status == 1)
                                            Hidden
                                            @else
                                            Visible
                                            @endif
                                    </td>
                                    <td><a href="{{url('posts/'.$item->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a></td>
                                    <td>
                                    <form action="{{url('posts/'.$item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
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
@endsection
