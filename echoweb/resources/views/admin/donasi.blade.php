@extends('layouts.admin')

@section('nama')
	Tabel Donasi
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Donasi</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>Campaign</th>
											<th>Nominal</th>
											<th>Email</th>
											<th>Pembayaran</th>
											<th>Kode Unik</th>
											<th>Status</th>       
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
        "ajax": "{{ route('donasi.get') }}",
        "columns": [
			{ data: 'actions', name: 'actions', orderable: false, searchable: false },
            { data: 'campaign', name: 'campaign' },
            { data: 'nominal', name: 'nominal', orderable: false},
            { data: 'email', name: 'email' },
            { data: 'payment', name: 'payment.name' },
            { data: 'kode_unik', name: 'kode_unik' },
            { data: 'status', name: 'status' }
        ]
    });
});
</script>
@endsection