@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Course</div>

                <div class="card-body">
                    <form action="{{ route('storeCourse')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Course Name">
                            <small class="form-text text-muted">The Name of the course should not be greater than 100 characters.</small>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="credit_hours">Credit Hours</label>
                            <input type="number" class="form-control @error('credit_hours') is-invalid @enderror"
                                name="credit_hours" placeholder="Credit Hours" min="1">

                            @error('credit_hours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" placeholder="Course Description"></textarea>

                            <small class="form-text text-muted">The Description of the course should not be greater than 500 characters.</small>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Create New Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection