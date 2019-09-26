@extends('admin.layout')
@section('title')
Quản lý User
@endsection

@section('content')
<div class="row">
	{{-- <a href="{{ route('country.create') }}" class="btn" style="margin:13px;">Thêm mới</a> --}}
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div>
			<table id="-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>ID</th>
						<th>First_Name</th>
						<th>Last_Name</th>
						<th class="hidden-480">Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Avatar</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($liststudent as $row)
					<tr>
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>

						<td>{{( $row->id )}}</td>
						<td>{{( $row->first_name )}}</td>
						<td>{{( $row->last_name )}}</td>
						<td>{{( $row->email )}}</td>
						<td>{{( $row->phone )}}</td>
						<td>{{( $row->address )}}</td>
						<td style="text-align: center;"><img style="width: 60px;" src="{{url('').'/upload/student/'.$row->avatar}}"></td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="#">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="#" onclick="return confirm('Xác nhận xóa?')">
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
				<div>{{ $liststudent->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection