@extends('layouts.admin')

@section('nama')
	Tambah Team
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<form method="POST" action="{{ url('pengelola/team/edit/'.$team->id) }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Team Baru</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama" id="nama" class="form-control" placeholder="nama team" value="{{$team->name}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Posisi</label>
										<input type="text" name="no_telp" class="form-control" placeholder="Marketing Manager" value="{{$team->posisi}}">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Facebook (optional)</label>
										<input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/yukbantu" value="{{$team->facebook}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Instagram (optional)</label>
										<input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/yukbantu" value="{{$team->instagram}}">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Twitter (optional)</label>
										<input type="text" name="twitter" class="form-control" placeholder="https://www.twitter.com/yukbantu" value="{{$team->twitter}}">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Google+ (optional)</label>
										<input type="text" name="google" class="form-control" placeholder="https://plus.google.com/u/0/01234567890123456" value="{{$team->google}}">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Gambar/Foto</h3>
						</div>
						<div class="panel-body">
							<div class="image-preview" style="background-image:url({{url('/echoweb/public'.$team->gambar)}});background-size:contain;background-repeat:no-repeat;background-position:center center;">
								<label for="image-upload" id="image-label">Pilih Gambar</label>
								<input type="file" name="gambar" id="image-upload" />
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
<script src="{{asset('js/jquery.uploadPreview.js')}}"></script>
<script>
$(document).ready(function() {
	$('#name').change(function(){
		var slug = $(this).val();
		slug = slug.replace(/[^a-zA-Z ]/g, "");
		slug = slug.replace(/\s+/g, '-').toLowerCase();
			$('#url').val(slug);
	});
	$.uploadPreview({
		input_field: "#image-upload",   // Default: .image-upload
		preview_box: ".image-preview",  // Default: .image-preview
		label_field: "#image-label",    // Default: .image-label
		label_default: "Pilih Gambar",   // Default: Choose File
		label_selected: "Ganti Gambar",  // Default: Change File
		no_label: false                 // Default: false
	});
});
</script>
@endsection