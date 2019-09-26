@extends('admin.layout')
@section('title')
Quản lý Course
@endsection

@section('content')
<div class="row">
	<a href="{{ route('course.create') }}" class="btn btn-primary" style="margin:13px;">Thêm mới</a>
	@if ($errors->has('mgss'))
	<p style="color: green;">{{ $errors->first('mgss')}}</p>
	@elseif ($errors->has('mgse'))
	<p style="color: red;">{{ $errors->first('mgse')}}</p>
	@endif
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>ID</th>
						<th>course_code</th>
						<th class="hidden-480">course_name</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listcourse as $row)
					<tr>
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						<td>{{( $row->id )}}</td>
						<td>{{( $row->course_code )}}</td>
						<td class="hidden-480">{{( $row->course_name )}}</td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="blue" href="{{route('course.show',['id'=>$row->id])}}">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a>

								<a class="green" href="{{route('course.edit',['id'=>$row->id])}}">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="{{route('course.detroy',['id'=>$row->id])}}" onclick="return confirm('Xác nhận xóa?')">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
							</div>
							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
												<span class="blue">
													<i class="ace-icon fa fa-search-plus bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
												<span class="green">
													<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row" style="text-align: center;">
				<div>{{ $listcourse->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection