@extends('layouts.app-web-layout')

@section('title', 'Import Students Data') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-20px">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Imported Students Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('students/imports') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="input-group">
                                <input type="file" name="import_file" class="form-control" />
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>

                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adm No</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Day or Boarding</th>
                                    <th>Stream</th>
                                    <th>Class Teacher</th>
                                    <th>Status</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->adm_no }}</td>
                                        <td>{{ $item->student_name }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->day_or_boarding }}</td>
                                        <td>{{ $item->stream }}</td>
                                        <td>{{ $item->classteacher }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->dob }}</td>
                                        <td>{{ $item->gender }}</td>
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
