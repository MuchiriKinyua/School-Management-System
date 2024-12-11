<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $break->name }}</p>
</div>

<!-- Duration Minutes Field -->
<div class="col-sm-12">
    {!! Form::label('duration_minutes', 'Duration Minutes:') !!}
    <p>{{ $break->duration_minutes }}</p>
</div>

<!-- Start Time Field -->
<div class="col-sm-12">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{{ $break->start_time }}</p>
</div>

<!-- End Time Field -->
<div class="col-sm-12">
    {!! Form::label('end_time', 'End Time:') !!}
    <p>{{ $break->end_time }}</p>
</div>

