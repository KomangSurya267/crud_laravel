@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-title">Create User</div>
    <div class="card-body">
        <form action="{{route('student.store')}}" method="post">
            @csrf
            <div class="mb3">
                <label for="" class="form">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name') }}">
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="mb3">
                <label for="" class="form-label">Birth Date</label>
                <input type="date" name="birth_date" class="form-control" value="{{old('birth_date') }}">
                @error('birth_date') 
                    {{$message}} 
                @enderror 
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Age</label>
                <input type="text" name="age" class="form-control" value="{{old('age') }}">
                @error('age') 
                    {{$message}} 
                @enderror 
            </div>
            <input type="submit" class="btn btn-success" value="Save">
        </form>
    </div>
</div>
@endsection