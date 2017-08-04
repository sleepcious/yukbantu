@extends('layouts.public')

@section('nama')
	Beranda
@endsection

@section('meta_tag')
<meta name="description" content="{{$campaign->short_desc}}" />

<!-- Twitter Card data -->
<!-- <meta name="twitter:card" content="summary"> -->
<!-- <meta name="twitter:site" content="@publisher_handle"> -->
<!-- <meta name="twitter:title" content="Page Title"> -->
<!-- <meta name="twitter:description" content="{{$campaign->short_desc}}"> -->
<!-- <meta name="twitter:creator" content="@author_handle"> -->
<!-- Twitter Summary card images must be at least 120x120px -->
<!-- <meta name="twitter:image" content="{{url('/echoweb/public'.$campaign->gambar)}}"> -->

<!-- Open Graph data -->
<meta property="og:title" content="{{$campaign->judul}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{url($campaign->link_campaign)}}" />
<meta property="og:image" content="{{url('/echoweb/public'.$campaign->gambar)}}" />
<meta property="og:description" content="{{$campaign->short_desc}}" /> 
<meta property="og:site_name" content="YukBantu.org" />
<!-- <meta property="fb:admins" content="Facebook numeric ID" /> -->
@endsection

@section('content')
<?php
	use Carbon\Carbon;
?>
<div class="page-inner campaigndetail">
	<div class="container">
		<div class="row">
			<div class="col-xs-12" style="margin-bottom:20px;">
				<h1>{{$campaign->judul}}</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-8">
				<div class="camp-img">
					<img src="{{url('/echoweb/public'.$campaign->gambar)}}" alt="{{$campaign->judul}}" />
				</div>
				<div class="camp-short">
					{{$campaign->short_desc}}
				</div>
			</div>
			<?php
				$rponline = \App\Donasi::where([['campaign_id', $campaign->id], ['status', 2], ['currency', 1]])->sum('nominal');
				$rpoffline = \App\DonasiOffline::where([['campaign_id', $campaign->id], ['currency', 1]])->sum('nominal');
				$donasi = $rponline + $rpoffline;
				
				$persentase = ($donasi / $campaign->target_dana) * 100;
				
				if($campaign->deadline != null && $campaign->deadline != ''){
					$created = new Carbon($campaign->deadline);
					$now = Carbon::now();
					$difference = $now->diffInDays($created);
				}
			?>
			<div class="col-xs-12 col-sm-5 col-md-4">
				<a href="{{url($campaign->link_campaign.'/sayabantu')}}" class="btn btn-danger btn-rounded btn-besar btn-block">Saya Mau Bantu</a>
				<div class="capaian">Rp{!! number_format($donasi, 0, ',', '.') !!}</div>
				<div class="target">Dikumpulkan dari target Rp{!! number_format($campaign->target_dana, 0, ',', '.') !!}</div>
				<div class="progress progress-md">
					<div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar" aria-valuenow="{!! number_format($persentase, 0, ',', '.') !!}" aria-valuemin="0" aria-valuemax="100" style="width: {!! number_format($persentase, 0, ',', '.') !!}%">
						<span class="sr-only">{!! number_format($persentase, 0, ',', '.') !!}% Complete</span>
					</div>
				</div>
				<div class="progress-text">
					<span class="pull-left">{!! number_format($persentase, 0, ',', '.') !!}% Terkumpul</span>
					@if($campaign->deadline != null && $campaign->deadline != '')
					<span class="pull-right"><i class="icon-calendar"></i> {!! $difference !!} Hari lagi</span>
					@else
					<span class="pull-right"><i class="icon-calendar"></i>  Tanpa Batas Akhir</span>
					@endif
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="fb-share-button" data-href="{{url($campaign->link_campaign)}}" data-layout="button" data-size="small" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore btn btn-block btn-info btn-rounded btn-lg" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={!! urlencode(url($campaign->link_campaign)) !!}&amp;src=sdkpreparse"><strong><i class="icon-social-facebook"></i> Bagikan ke Facebook</strong></a></div>
					</div>
				</div>
				<div class="campaigner">
					<h2>Relawan</h2>
					<div class="campaigner-img" style="background:url({{$campaign->pengguna->gambar}}) no-repeat center center;background-size:cover;"></div>
					<div class="campaigner-name"><a href="{{url('orangberuntung/'.$campaign->pengguna->id)}}">{{$campaign->pengguna->name}}</a> @if($campaign->pengguna->status == 2)<span class="text-success" data-toggle="tooltip" data-placement="top" title="Relawan telah terverifikasi"><i class="icon-badge"></i></span>@endif</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-8">
				<div class="panel panel-white campaign-long">
					<div class="panel-body">
						{!! $campaign->long_desc !!}
					</div>
				</div>
				<div class="disclaimer">
					Disclaimer: Informasi dan opini yang tertulis di halaman ini adalah milik relawan dan tidak mewakili YukBantu.org
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-4">
				
			</div>
		</div>
		<!-- <div class="separator"></div> -->
	</div>
</div>
<div class="btn-layang">
	<a href="{{url($campaign->link_campaign.'/sayabantu')}}" class="btn btn-danger btn-rounded btn-besar btn-block hidden-xs">Saya Mau Bantu</a>
	<a href="{{url($campaign->link_campaign.'/sayabantu')}}" class="btn btn-danger btn-rounded visible-xs-block">Saya Mau Bantu</a>
</div>
@endsection

@section('additional')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=483041602057745";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
$(document).ready(function(){
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		 //>=, not <=
		if (scroll >= 200) {
			$(".btn-layang").addClass("show");
		}else{
			$(".btn-layang").removeClass("show");
		}
	});
});
</script>
@endsection