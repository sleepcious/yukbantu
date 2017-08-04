@extends('layouts.admin')

@section('nama')
	Tabel Deposit
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Transaksi Deposit SakuBantu</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Tindakan</th>
											<th>Email</th>
											<th>Nominal</th>
											<th>Pembayaran</th>
											<th>Kode Unik</th>
											<th>Status</th>
											<th>Tgl & Waktu</th>     
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
        "ajax": "{{ route('deposit.get') }}",
        "columns": [
            { data: 'actions', name: 'actions', orderable: false},
            { data: 'email', name: 'email'},
			{ data: 'nominal', name: 'nominal', orderable: false },
			{ data: 'payment', name: 'payment'},
			{ data: 'kode_unik', name: 'kode_unik'},
			{ data: 'status', name: 'status'},
			{ data: 'time', name: 'time' }
        ]
    });
});
</script>
@endsection