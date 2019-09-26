@extends('admin.layout')
@section('title')
Update Course
@endsection
@section('content')
@if($getrow)
{!! Form::open(['class' => 'form-horizontal','method' => 'post','route'=>['course.update',$getrow->id]]) !!}
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> Course code </label>
	<div class="col-sm-9">
		{!! Form::text('course_code', $getrow->course_code,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'course code']) !!}
		@if ($errors->has('course_code'))
		<p style="color: red;">{{ $errors->first('course_code')}}</p>
		@endif
	</div>
	
</div>
<div class="form-group"=>
	<label class="col-sm-3 control-label no-padding-right"> Course name </label>
	<div class="col-sm-9">
		{!! Form::text('course_name', $getrow->course_name,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'course name']) !!}
		@if ($errors->has('course_name'))
		<p style="color: red;">{{ $errors->first('course_name')}}</p>
		@endif
	</div>
	
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		{!! Form::submit('Cập nhật',['class' => 'btn btn-info ']) !!}
		&nbsp; &nbsp; &nbsp;
		<a class="btn" href="{{route('course.index')}}">Hủy bỏ</a>
	</div>
</div>
{!! Form::close() !!}
@endif
@endsection