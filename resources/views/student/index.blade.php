@extends('templates.default')

@php

$pretitle = 'Student';
$title = 'Student Data';

@endphp 

@section('content')
<div class="card">
    <div class="table-responsive">
      <table
class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th> 
            <th>Age</th>
            <th>Birth Date</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td >{{$student->name}}</td>
                <td >{{$student->age}}</td>
                <td >{{$student->birth_date}}</td>
                <td>
                <a href="{{route('student.edit', $student)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('student.destroy', $student)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
              </tr>
                
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('action')
  <a href="{{route('student.create')}}" class="btn btn-primary"> Add New Student </a>

@endsection

@push('scripts')
    <script src="datatable.js"></script> 
@endpush
