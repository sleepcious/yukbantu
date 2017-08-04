@extends('layouts.admin')

@section('nama')
	Tambah Partner
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<form method="POST" action="{{ url('pengelola/partner/add') }}" enctype="multipart/form-data" novalidate>
					{{ csrf_field() }}
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Partner Baru</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="nama partner" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>No. Telp (optional)</label>
										<input type="text" name="no_telp" class="form-control" placeholder="contoh: 021-1234567">
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="form-group">
										<label>Website (optional)</label>
										<input type="text" name="website" class="form-control" placeholder="contoh: www.yukbantu.org">
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
							<div class="image-preview">
								<label for="image-upload" id="image-label">Pilih Gambar</label>
								<input type="file" name="gambar" id="image-upload" required />
							</div>
						</div>
					</div>
					<input type="hidden" name="url" id="url">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Tentang Partner</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<textarea class="form-control" name="biografi" id="biografi" required placeholder="about partner"></textarea>
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
	@include('mceImageUpload::upload_form')
@endsection

@section('additional')
<script src="{{asset('js/jquery.uploadPreview.js')}}"></script>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
$(document).ready(function() {
	tinymce.init({
		selector: 'textarea',
		height: 300,
		theme: 'modern',
		menubar: false,
		plugins: [
			'advlist autolink lists link image charmap preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools'
		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview | forecolor backcolor emoticons',
		image_advtab: true,
		templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		],
		relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            // trigger file upload form
            if (type == 'image') $('#formUpload input').click();
        }
	});
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