@extends('layouts.admin')

@section('nama')
	Tabel Halaman
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Halaman</h3>
							<div class="panel-control">
								<a href="{{url('pengelola/setting/rekening/add')}}" class="btn btn-ijo">Tambah Rekening</a>
							</div>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Nama</th>
											<th>No. Rekening</th>
											<th>Cabang</th>
											<th>Akun</th>
											<th>&nbsp;</th>       
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
	
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="hapusData" aria-hidden="true" id="hapusData">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					Yakin ingin menghapus cara pembayaran / rekening ini?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<a class="btn btn-success">Ya</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')
<script src="{{asset('admin-theme/assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('#hapusData').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var url = button.data('url');
		var modal = $(this);
		modal.find('.modal-footer .btn-success').attr("href", url);
	});
    $('#campaign').DataTable({
        "processing": true,
        "serverSide": true,
		"responsive": true,
        "ajax": "{{ route('rekening.get') }}",
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'rekening', name: 'rekening' },
            { data: 'cabang', name: 'cabang' },
            { data: 'atas_nama', name: 'atas_nama'},
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