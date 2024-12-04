<!-- Choice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('choice', 'Choice:') !!}
    {!! Form::text('choice', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>