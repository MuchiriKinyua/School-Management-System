<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $teacher->first_name }}</p>
</div>

<!-- Surname Field -->
<div class="col-sm-12">
    {!! Form::label('surname', 'Surname:') !!}
    <p>{{ $teacher->surname }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $teacher->title }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $teacher->email }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $teacher->phone_number }}</p>
</div>

<!-- Id Number Field -->
<div class="col-sm-12">
    {!! Form::label('id_number', 'Id Number:') !!}
    <p>{{ $teacher->id_number }}</p>
</div>

<!-- Tsc Number Field -->
<div class="col-sm-12">
    {!! Form::label('tsc_number', 'Tsc Number:') !!}
    <p>{{ $teacher->tsc_number }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $teacher->status }}</p>
</div>

