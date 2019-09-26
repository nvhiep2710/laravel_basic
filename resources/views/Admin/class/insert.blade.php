@extends('admin.layout')
@section('title')
Insert Class
@endsection
@section('content')
{!! Form::open(['class' => 'form-horizontal','method' => 'post','route'=>['class.store']]) !!}
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> code class </label>
	<div class="col-sm-9">
		{!! Form::text('class_code', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'class code']) !!}
		@if ($errors->has('class_code'))
		<p style="color: red;">{{ $errors->first('class_code')}}</p>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> name class</label>
	<div class="col-sm-9">
		{!! Form::text('class_name', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'class name']) !!}
		@if ($errors->has('class_name'))
		<p style="color: red;">{{ $errors->first('class_name')}}</p>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> name class</label>
	<div class="col-sm-9">
		<div class="col-xs-10 col-sm-5">
			<select name="id_course" class="form-control" id="form-field-select-1">
				@foreach($listcourse as $row)
				<option value="{{$row->id}}">{{$row->course_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> Date </label>
	<div class="col-sm-9">
		<div class="col-xs-10 col-sm-5 input-daterange input-group">
			<input type="date" class="input-sm form-control" name="start_date">
			<span class="input-group-addon">
				<i class="fa fa-exchange"></i>
			</span>
			<input type="date" class="input-sm form-control" name="end_date">
		</div>
		@if ($errors->has('start_date'))
		<p style="color: red;">{{ $errors->first('start_date')}}</p>
		@endif
		@if ($errors->has('end_date'))
		<p style="color: red;">{{ $errors->first('end_date')}}</p>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> schedule </label>
	<div class="col-sm-9">
		{!! Form::text('schedule', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'schedule']) !!}
		@if ($errors->has('schedule'))
		<p style="color: red;">{{ $errors->first('schedule')}}</p>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> description </label>
	<div class="col-sm-9">
		{!! Form::textarea('description', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'description']) !!}
		@if ($errors->has('description'))
		<p style="color: red;">{{ $errors->first('description')}}</p>
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