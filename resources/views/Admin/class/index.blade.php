@extends('admin.layout')
@section('title')
Quản lý Class
@endsection

@section('content')
<div class="row">
	<a href="{{ route('class.create') }}" class="btn btn-primary" style="margin:13px;">Thêm mới</a>
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
						<th>class_code</th>
						<th>class_name</th>
						<th class="hidden-480">start_date</th>
						<th class="hidden-480">end_date</th>
						<th class="hidden-480">schedule</th>
						<th class="hidden-480">course</th>
						<th class="hidden-480">description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listclass as $row)
					<tr>
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						<td>{{( $row->id )}}</td>
						<td>{{( $row->class_code )}}</td>
						<td>{{( $row->class_name )}}</td>
						<td>{{( $row->start_date )}}</td>
						<td>{{( $row->end_date )}}</td>
						<td>{{( $row->schedule )}}</td>
						@foreach($listcourse as $cou)
						@if($cou->id == $row->id_course)
						<td>{{( $cou->course_name )}}</td>
						@endif
						@endforeach
						<td>{{( $row->description )}}</td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="{{route('class.edit',['id'=>$row->id])}}">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="{{route('class.detroy',['id'=>$row->id])}}" onclick="return confirm('Xác nhận xóa?')">
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
				<div>{{ $listclass->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection