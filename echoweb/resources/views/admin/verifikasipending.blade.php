@extends('layouts.admin')

@section('nama')
	Tabel Verifikasi User
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Data Request Verifikasi User</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Email</th>
											<th>Status</th>
											<th>Detail</th>       
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
        "processing": true,
        "serverSide": true,
		"responsive": true,
        "ajax": "{{ route('verifikasipending.get') }}",
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email'},
            { data: 'status', name: 'status' },
			{ data: 'detail', name: 'detail', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection