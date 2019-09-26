@extends('admin.layout')
@section('title')
Quản lý Course
@endsection

@section('content')
<div class="row">
	{{-- <a href="{{ route('country.create') }}" class="btn" style="margin:13px;">Thêm mới</a> --}}
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
						<th>Student id</th>
						<th class="hidden-480">Student mail</th>
						<th>first name</th>
						<th>last name</th>
						<th>course name</th>
						<th>class name</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listregistercourse as $row)
					<tr>
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						<td>{{( $row->id )}}</td>
						<td>{{( $row->id_student )}}</td>
						<td>{{( $row->email )}}</td>
						<td>{{( $row->first_name )}}</td>
						<td>{{( $row->last_name )}}</td>
						<td>{{( $row->course_name )}}</td>
						<td>{{( $row->class_name )}}</td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="#">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
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
				<div>{{ $listregistercourse->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection