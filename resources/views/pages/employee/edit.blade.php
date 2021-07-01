
@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Edit Employee Data
                        <a href="{{url('employee')}}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update-employee/'.$employee->id)}}" method='POST'>
                            @csrf
                            
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" value="{{$employee -> name}}" class="form-control" name="name">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{$employee -> email}}" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" value="{{$employee -> phone}}" name="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" value="{{$employee -> designation}}" name="designation">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{$employee ->status == 1 ? 'checked':''}} >Unactive-1 / Active-0
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