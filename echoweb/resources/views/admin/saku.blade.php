@extends('layouts.admin')

@section('nama')
	Tabel SakuBantu
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Transaksi SakuBantu</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Email</th>
											<th>Deposit</th>
											<th>Redeem</th>     
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
        "ajax": "{{ route('saku.get') }}",
        "columns": [
            { data: 'email', name: 'email'},
			{ data: 'debet', name: 'debet', orderable: false },
			{ data: 'kredit', name: 'kredit', orderable: false },
			{ data: 'time', name: 'time' }
        ]
    });
});
</script>
@endsection