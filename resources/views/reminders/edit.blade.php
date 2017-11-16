@extends("layout.master")
@section("content")
{!! Form::open(['reminders.update', $id, $code]) !!}
	<div class="form-group">
    {!! Form::password('password', array('placeholder'=>'new password', 'required'=>'required')) !!}
    {!! Form::password('password_confirmation', array('placeholder'=>'new password confirmation', 'required'=>'required')) !!}
</div>
    {!! Form::submit('Reset Password', array('class' => 'btn btn-raised btn-primary')) !!}
{!! Form::close() !!}
@stop