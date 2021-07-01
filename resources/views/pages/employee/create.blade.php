@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Add Employee
                        <a href="{{url('employee')}}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('store-employee')}}" method='POST'>
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" name="designation">
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