@extends('layouts.public')

@section('nama')
	Beranda
@endsection

@section('content')
<div class="page-inner public">
	<div class="slider">
		 <div class="owl-carousel owl-theme">
            <div class="item panel-green">
              <h4>1</h4>
            </div>
            <div class="item panel-green">
              <h4>2</h4>
            </div>
            <div class="item panel-green">
              <h4>3</h4>
            </div>
            <div class="item panel-green">
              <h4>4</h4>
            </div>
            <div class="item panel-green">
              <h4>5</h4>
            </div>
            <div class="item panel-green">
              <h4>6</h4>
            </div>
            <div class="item panel-green">
              <h4>7</h4>
            </div>
            <div class="item panel-green">
              <h4>8</h4>
            </div>
            <div class="item panel-green">
              <h4>9</h4>
            </div>
            <div class="item panel-green">
              <h4>10</h4>
            </div>
            <div class="item panel-green">
              <h4>11</h4>
            </div>
            <div class="item panel-green">
              <h4>12</h4>
            </div>
        </div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<div class="panel info-box panel-red">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">107,200</p>
							<span class="info-box-title">Good People</span>
						</div>
						<div class="info-box-icon hidden-xs">
							<i aria-hidden="true" class="icon-user-following"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel info-box panel-red">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">1,200,000,000,000</p>
							<span class="info-box-title">Donated (Rp)</span>
						</div>
						<div class="info-box-icon hidden-xs">
							<i aria-hidden="true" class="icon-wallet"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="panel info-box panel-red">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">107,200</p>
							<span class="info-box-title">Funded</span>
						</div>
						<div class="info-box-icon hidden-xs">
							<i aria-hidden="true" class="icon-support"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="nw">
		coba
	</section>
</div>
@endsection

@section('additional')

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('js/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/assets/owl.theme.default.min.css')}}">
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('.owl-carousel').owlCarousel({
				loop: true,
				responsiveClass: true,
				items: 1
			});
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	</script>
@endsection