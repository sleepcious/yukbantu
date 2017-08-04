@extends('layouts.admin')

@section('nama')
	Tabel User
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">User</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Email</th>
											<th>Tipe</th>
											<th>Role</th>       
											<th>Status</th>       
											<th>Action</th>       
										</tr>
									</thead>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')
<script src="{{asset('admin-theme/assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#campaign').DataTable({
		"responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('users.get') }}",
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email'},
            { data: 'tipe', name: 'tipe' },
            { data: 'role', name: 'role' },
            { data: 'status', name: 'status' },
			{ data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });
	<?php
	if(Session::has('flash_message'))
		echo Session::get('flash_message');
	?>
});
</script>
@endsection