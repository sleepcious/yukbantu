@extends('layouts.admin')

@section('nama')
	Tabel Slider
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Slider/Slideshow Ubah</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="POST" action="{{ url('pengelola/setting/slideshow/edit/'.$slider->id) }}" enctype="multipart/form-data">
							{{ csrf_field() }}
								<div class="image-preview" style="background-image:url({{url('/echoweb/public'.$slider->gambar)}});background-size:contain;background-repeat:no-repeat;background-position:center center;">
									<label for="image-upload" id="image-label">Ganti Gambar</label>
									<input type="file" name="gambar" id="image-upload" required />
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Url (optional)</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="url" name="url" placeholder="http://yukbantu.org" value="{{$slider->url}}">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" class="btn btn-tosca">Simpan</button>
										<a type="submit" class="btn btn-default" href="{{url('pengelola/setting/slideshow')}}">Batal</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')
<script src="{{asset('js/jquery.uploadPreview.js')}}"></script>
<script>
$(document).ready(function() {
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