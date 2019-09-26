@extends('admin.layout')
@section('title')
Thêm Country
@endsection
@section('content')
{!! Form::open(['class' => 'form-horizontal','method' => 'post','route'=>['country.store']]) !!}
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> Code </label>
	<div class="col-sm-9">
		{!! Form::text('country_code', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'Country Code']) !!}
		@if ($errors->has('country_code'))
		<p style="color: red;">{{ $errors->first('country_code')}}</p>
		@endif
	</div>
</div>

<div class="form-group"=>
	<label class="col-sm-3 control-label no-padding-right"> Tên </label>
	<div class="col-sm-9">
		{!! Form::text('country_name', null,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'Country Name']) !!}
		@if ($errors->has('country_name'))
		<p style="color: red;">{{ $errors->first('country_name')}}</p>
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