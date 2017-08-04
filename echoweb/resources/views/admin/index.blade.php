@extends('layouts.admin')

@section('nama')
	Dashboard Admin
@endsection

@section('content')
	<?php
		use \Carbon\Carbon;
		$berjalan = Carbon::today()->format('Y');
		
		$begin = new DateTime(new Carbon('first day of January '.$berjalan)); 
		$end = new DateTime(Carbon::today()->format('Y-m-d')); 

		$interval = new DateInterval( "P1M" );
		$period = new DatePeriod($begin, $interval, $end);
		
		$cek = \App\Settings::where('meta_name', 'kursdollar')->get()->count();
		if($cek != 0 || $cek == 1){
			$kursdollar = \App\Settings::where('meta_name', 'kursdollar')->first();
		}
	?>
	<div class="page-inner">
		<div id="main-wrapper">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">
									{!! \App\Donasi::where('status', 1)->count() !!}
								</p>
								<span class="info-box-title">Donasi Pending</span>
							</div>
							<div class="info-box-icon">
								<i aria-hidden="true" class="icon-shield"></i>
							</div>
						</div>
						</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">
									{!! \App\Donasi::where('status', 2)->count() !!}
								</p>
								<span class="info-box-title">Donasi Terverifikasi</span>
							</div>
							<div class="info-box-icon">
								<i aria-hidden="true" class="icon-emoticon-smile"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">
									{!! \App\Donasi::where('status', 3)->count() !!}
								</p>
								<span class="info-box-title">Donasi Gagal/Batal</span>
							</div>
							<div class="info-box-icon">
								<i aria-hidden="true" class="icon-close"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">
									{!! \App\Campaign::where('status', 1)->count() !!}
								</p>
								<span class="info-box-title">Campaign Publish/Berjalan</span>
							</div>
							<div class="info-box-icon">
								<i aria-hidden="true" class="icon-speech"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter">
									{!! \App\Campaign::where('status', 3)->count() !!}
								</p>
								<span class="info-box-title">Campaign Publish/Berjalan</span>
							</div>
							<div class="info-box-icon">
								<i aria-hidden="true" class="icon-layers"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="panel info-box panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">Nominal Donasi {!! Carbon::today()->format('Y') !!}</h3>
						</div>
						<div class="panel-body">
							<div id="chartdonasi"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional')
	<script>
		$(document).ready(function() {
			Morris.Area({
				element: 'chartdonasi',
				data: [
					<?php
						foreach ( $period as $dt ){
							$month = $dt->format("m");
							$year = $dt->format("Y");
							$periode = $dt->format("Y-m");
							$rupiah = \App\Donasi::where([['status', 2], ['currency', 1]])->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('nominal');
							if($cek != 0 || $cek == 1){
								if($kursdollar->konten != null && $kursdollar->konten != ''){
									$dollar = \App\Donasi::where([['status', 2], ['currency', 2]])->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('nominal');
									$kursjalan = floatval($kursdollar->konten);
									$konversi = $dollar * $kursjalan;
									$nominal = $rupiah + $konversi;
								}else{
									$nominal = $rupiah;
								}
							}else{
								$nominal = $rupiah;
							}
							
							echo "{period: '".$periode."', iphone: ".$nominal."},";
						}
					?>
				],
				xkey: 'period',
				ykeys: ['iphone'],
				labels: ['Nominal Rp'],
				hideHover: 'auto',
				lineColors: ['#62C3D0'],
				resize: true,
			});
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	</script>
@endsection