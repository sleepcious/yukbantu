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
							<h3 class="panel-title">Slider/Slideshow</h3>
							<div class="panel-control">
								<a href="{{url('pengelola/setting/slideshow/add')}}" class="btn btn-ijo">Tambah Slideshow</a>
							</div>
						</div>
						<div class="panel-body">
							<div id="grid-gallery" class="grid-gallery">
								<section class="grid-wrap">
									<ul class="grid">
										<li class="grid-sizer"></li>
										@foreach($sliders as $slider)
											<li>
												<figure>
													<img src="{{url('/echoweb/public'.$slider->gambar)}}" />
												</figure>
											</li>
										@endforeach
									</ul>
								</section>
								<section class="slideshow">
									<ul>
										@foreach($sliders as $slider)
											<li>
												<figure>
													<figcaption>
														<a href="{{url('pengelola/setting/slideshow/edit/'.$slider->id)}}" class="btn btn-ijo"><i class="icon-pencil"></i> Ganti Gambar</a>
														<a data-url="{{url('pengelola/setting/slideshow/del/'.$slider->id)}}" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger pull-right"><i class="icon-ban"></i> Hapus</a>
													</figcaption>
													<img src="{{url('/echoweb/public'.$slider->gambar)}}" />
												</figure>
											</li>
										@endforeach
									</ul>
									<nav>
										<span class="fa fa-angle-left nav-prev"></span>
										<span class="fa fa-angle-right nav-next"></span>
										<span class="fa fa-times nav-close"></span>
									</nav>
								</section>
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
					Yakin ingin menghapus slider ini?
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
<link href="{{asset('admin-theme/assets/plugins/gridgallery/css/component.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('admin-theme/assets/plugins/gridgallery/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('admin-theme/assets/plugins/gridgallery/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('admin-theme/assets/plugins/gridgallery/js/classie.js')}}"></script>
<script src="{{asset('admin-theme/assets/plugins/gridgallery/js/cbpgridgallery.js')}}"></script>
<script>
$(document).ready(function() {
	$('#hapusData').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var url = button.data('url');
		var modal = $(this);
		modal.find('.modal-footer .btn-success').attr("href", url);
	});
	new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
    <?php
	if(Session::has('flash_message'))
		echo Session::get('flash_message');
	?>
});
</script>
@endsection