@extends('layouts.admin')

@section('nama')
	Ubah Data User
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<form method="POST" action="{{ url('pengelola/pengguna/edit/'.$user->id) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Ubah Data User <small>{{$user->name}}</small></h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" class="form-control" value="{{$user->name}}" name="name">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" value="{{$user->email}}" name="email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" class="form-control" value="{{$user->lokasi}}" name="lokasi">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label>No. Telp/HP</label>
										<input type="text" class="form-control" value="{{$user->no_telp}}" name="no_telp">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="form-group">
										<label>Tipe User</label>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->tipe == 2) echo 'checked'; ?> value="2" name="tipe">Organisasi
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->tipe == 1) echo 'checked'; ?> value="1" name="tipe">Personal
											</label>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="form-group">
										<label>Role User</label>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->role == 2) echo 'checked'; ?> value="2" name="role">User
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->role == 1) echo 'checked'; ?> value="1" name="role">Admin
											</label>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="form-group">
										<label>Status User</label>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->status == 2) echo 'checked'; ?> value="2" name="status">Terverifikasi
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="radio" <?php if($user->status == 1) echo 'checked'; ?> value="1" name="status">Terdaftar
											</label>
										</div>
									</div>
								</div>
								<?php
									$partners = \App\Partner::all();
								?>
								<div class="col-xs-12 col-sm-6 col-md-3">
									<div class="form-group">
										<label>Partner of</label>
										<select class="form-control select2" name="partner" data-placeholder="Bagian dari ...">
											<option></option>
											@foreach($partners as $partner)
											<option value="{{$partner->id}}">{{$partner->name}}</option></option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-block btn-tosca">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('additional')
<script src="{{asset('admin-theme/assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection