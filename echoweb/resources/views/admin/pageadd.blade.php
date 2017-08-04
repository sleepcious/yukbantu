@extends('layouts.admin')

@section('nama')
	Tambah Halaman
@endsection

@section('content')
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<form method="POST" action="{{ url('pengelola/setting/halaman/add') }}" enctype="multipart/form-data" novalidate>
					{{ csrf_field() }}
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Halaman Baru</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label>Judul</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Judul Halaman" required>
									</div>
								</div>
							</div>
							<input type="hidden" name="url" id="url">
							<div class="row">
								<div class="col-xs-12">
									<textarea class="form-control" name="konten" id="konten" required placeholder="isi halaman"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									&nbsp;
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
	@include('mceImageUpload::upload_form')
@endsection

@section('additional')
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
});
</script>
@endsection