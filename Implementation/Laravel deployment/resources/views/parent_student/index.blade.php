@extends('layouts.app-web-layout')

@section('title', 'Parent-Student Data')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-20px">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Parent-Student Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('parent-student/import') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="input-group">
                                <input type="file" name="import_file" class="form-control" />
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>

                        <hr>
                        <table class="table">
    <thead>
        <tr>
            <th>Adm No</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Day or Boarding</th>
            <th>Parent Name</th>
            <th>Telephone</th>
            <th>Stream</th>
            <th>Classteacher</th>
            <th>Status</th>
            <th>D.O.B</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        @foreach($relations as $relation)
            <tr>
                <td>{{ $relation->adm_no }}</td>
                <td>{{ $relation->student_name }}</td>
                <td>{{ $relation->class }}</td>
                <td>{{ $relation->day_or_boarding }}</td>
                <td>{{ $relation->parent_name }}</td>
                <td>{{ $relation->telephone }}</td>
                <td>{{ $relation->stream }}</td>
                <td>{{ $relation->classteacher }}</td>
                <td>{{ $relation->status }}</td>
                <td>{{ $relation->dob }}</td>
                <td>{{ $relation->gender }}</td>
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
