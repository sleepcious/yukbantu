@extends('layouts.admin')

@section('nama')
	Tabel Kategori
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Kategori Campaign</h3>
							<div class="panel-control">
								<a data-url="{{url('pengelola/setting/kategori/add')}}" data-toggle="modal" data-target="#cuData" href="#" class="btn btn-ijo">Tambah Kategori</a>
							</div>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table dataTable" id="campaign">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Slug/URL</th>
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
					Yakin ingin menghapus kategori ini?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<a class="btn btn-success">Ya</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="cuData" aria-hidden="true" id="cuData">
		<div class="modal-dialog modal-sm">
			<form method="POST" action="{{ url('pengelola/partner/add') }}" enctype="multipart/form-data" id="formcu">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" name="name" id="name" required class="form-control">
					</div>
					<input type="hidden" name="url" id="url">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success">Simpan</a>
				</div>
			</div>
			</form>
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
	$('#cuData').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var url = button.data('url');
		var konten = button.data('konten');
		var link = button.data('link');
		var modal = $(this);
		modal.find('#formcu').attr("action", url);
		modal.find('#name').val(konten);
		modal.find('#url').val(link);
	});
	$('#name').change(function(){
		var slug = $(this).val();
		slug = slug.replace(/[^a-zA-Z ]/g, "");
		slug = slug.replace(/\s+/g, '-').toLowerCase();
			$('#url').val(slug);
	});
    $('#campaign').DataTable({
        "processing": true,
        "serverSide": true,
		"responsive": true,
        "ajax": "{{ route('kategori.get') }}",
        "columns": [
            { data: 'name', name: 'name' },
            { data: 'url', name: 'url'},
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