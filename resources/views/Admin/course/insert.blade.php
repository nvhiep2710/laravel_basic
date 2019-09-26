@extends('admin.layout')
@section('title')
Insert Course
@endsection
@section('content')
{!! Form::open(['class' => 'form-horizontal','method' => 'post','route'=>['course.store']]) !!}
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> Course code </label>
	<div class="col-sm-9">
		{!! Form::text('course_code', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'course code']) !!}
		@if ($errors->has('course_code'))
		<p style="color: red;">{{ $errors->first('course_code')}}</p>
		@endif
	</div>
</div>
<div class="form-group"=>
	<label class="col-sm-3 control-label no-padding-right"> Course name </label>
	<div class="col-sm-9">
		{!! Form::text('course_name', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'course name']) !!}
		@if ($errors->has('course_name'))
		<p style="color: red;">{{ $errors->first('course_name')}}</p>
		@endif
	</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		{!! Form::submit('Thêm mới',['class' => 'btn btn-info ']) !!}
		&nbsp; &nbsp; &nbsp;
		{!! Form::reset('Nhập lại',['class' => 'btn']) !!}
	</div>
</div>
{!! Form::close()!!}
@endsection