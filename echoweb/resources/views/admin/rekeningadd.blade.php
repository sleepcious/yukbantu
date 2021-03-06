@extends('layouts.admin')

@section('nama')
	Tambah Rekening
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<form method="POST" action="{{ url('pengelola/setting/rekening/add') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Cara Pembayaran / Rekening Baru</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Contoh: BCA" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>No. Rekening</label>
										<input type="text" name="rekening" id="rekening" class="form-control" placeholder="Contoh: 0123456789" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Cabang</label>
										<input type="text" name="cabang" id="cabang" class="form-control" placeholder="Contoh: Jakarta Pusat" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Nama Akun</label>
										<input type="text" name="atas_nama" id="atas_nama" class="form-control" placeholder="Contoh: John Doe" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-ijo">Simpan</button>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')

<script>
$(document).ready(function() {
	
});
</script>
@endsection