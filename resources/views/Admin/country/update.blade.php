@extends('admin.layout')
@section('title')
Cập nhật Country
@endsection
@section('content')
@if($getrow)
{!! Form::open(['class' => 'form-horizontal','method' => 'post','route'=>['country.update',$getrow->id]]) !!}
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right"> Code </label>
	<div class="col-sm-9">
		{!! Form::text('country_code', $getrow->country_code,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'Country Code']) !!}
		@if ($errors->has('country_code'))
		<p style="color: red;">{{ $errors->first('country_code')}}</p>
		@endif
	</div>
</div>
<div class="form-group"=>
	<label class="col-sm-3 control-label no-padding-right"> Tên </label>
	<div class="col-sm-9">
		{!! Form::text('country_name', $getrow->country_name,['class' => 'col-xs-10 col-sm-5', 'placeholder'=> 'Country Name']) !!}
		@if ($errors->has('country_code'))
		<p style="color: red;">{{ $errors->first('country_code')}}</p>
		@endif
	</div>
</div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		{!! Form::submit('Cập nhật',['class' => 'btn btn-info ']) !!}
		&nbsp; &nbsp; &nbsp;
		<a class="btn" href="{{route('country.index')}}">Hủy bỏ</a>
	</div>
</div>
{!! Form::close() !!}
@endif
@endsection