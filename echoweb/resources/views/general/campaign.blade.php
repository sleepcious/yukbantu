@extends('layouts.public')

@section('nama')
	Beranda
@endsection

@section('meta_tag')
<meta name="description" content="Page description. No longer than 155 characters." />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="Page Title">
<meta name="twitter:description" content="Page description less than 200 characters">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter Summary card images must be at least 120x120px -->
<meta name="twitter:image" content="http://www.example.com/image.jpg">

<!-- Open Graph data -->
<meta property="og:title" content="Title Here" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.example.com/" />
<meta property="og:image" content="http://example.com/image.jpg" />
<meta property="og:description" content="Description Here" /> 
<meta property="og:site_name" content="Site Name, i.e. Moz" />
<meta property="fb:admins" content="Facebook numeric ID" />
@endsection

@section('content')
<?php
	use Carbon\Carbon;
?>
<div class="page-inner">
	<div class="container">
		<div class="row">
			@if($campaigns->count() < 1)
			<div class="col-xs-6 col-md-4">
				<div class="panel panel-white campaign-item">
					<div class="panel-heading">
						<div class="campaign-thumbnail" style="background:url({{asset('img/attachment1.jpg')}}) no-repeat center center;background-size:cover;"></div>
					</div>
					<div class="panel-body">
						<h2 class="text-success"><small class="text-warning">John Doe</small> <i class="icon-badge"></i></h2>
						<h4>Campaign Lorem Ipsum</h4>
						<p>Tolong Bantu Gibran Siuman, sdh lbh dari 90 hari tidak sadarkan diri karena sakit Encephalitis disertai penurunan densitas batang otak (Batang otak menghitam)</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<ul class="menu">
								<li>
									<h4 class="text-info">Rp1.200.000.000</h4>
									<span>Terkumpul</span>
								</li>
								<li>
									<h4 class="text-info">25%</h4>
									<span>Capaian</span>
								</li>
								<li>
									<h4 class="text-info">10</h4>
									<span>Hari lagi</span>
								</li>
							</ul>
						</div>
					</div>
					<a href="#"></a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="panel panel-white campaign-item">
					<div class="panel-heading">
						<div class="campaign-img">
							<div class="campaign-thumbnail" style="background:url({{asset('img/profile-picture.png')}}) no-repeat center center;background-size:contain;"></div>
						</div>
					</div>
					<div class="panel-body">
						<h2 class="text-success"><small class="text-warning">John Doe</small> <i class="icon-badge"></i></h2>
						<h4>Campaign Lorem Ipsum Dolor Sit Amet Dipanjangkan saja</h4>
						<p>Tolong Bantu Gibran Siuman, sdh lbh dari 90 hari tidak sadarkan diri karena sakit Encephalitis disertai penurunan densitas batang otak (Batang otak menghitam)</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<ul class="menu">
								<li>
									<h4 class="text-info">Rp1.200.000.000</h4>
									<span>Terkumpul</span>
								</li>
								<li>
									<h4 class="text-info">25%</h4>
									<span>Capaian</span>
								</li>
								<li>
									<h4 class="text-info">10</h4>
									<span>Hari lagi</span>
								</li>
							</ul>
						</div>
					</div>
					<a href="#"></a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="panel panel-white campaign-item">
					<div class="panel-heading">
						<div class="campaign-thumbnail" style="background:url({{asset('img/attachment1.jpg')}}) no-repeat center center;background-size:cover;"></div>
					</div>
					<div class="panel-body">
						<h2 class="text-success"><small class="text-warning">John Doe</small> <i class="icon-badge"></i></h2>
						<h4>Campaign Lorem Ipsum</h4>
						<p>Tolong Bantu Gibran Siuman, sdh lbh dari 90 hari tidak sadarkan diri karena sakit Encephalitis disertai penurunan densitas batang otak (Batang otak menghitam)</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<ul class="menu">
								<li>
									<h4 class="text-info">Rp1.200.000.000</h4>
									<span>Terkumpul</span>
								</li>
								<li>
									<h4 class="text-info">25%</h4>
									<span>Capaian</span>
								</li>
								<li>
									<h4 class="text-info">10</h4>
									<span>Hari lagi</span>
								</li>
							</ul>
						</div>
					</div>
					<a href="#"></a>
				</div>
			</div>
			@else
				@foreach($campaigns as $campaign)
					<div class="col-xs-6 col-md-4">
						<div class="panel panel-white campaign-item">
							<div class="panel-heading">
								<div class="campaign-thumbnail" style="background:url({{url('/echoweb/public'.$campaign->gambar)}}) no-repeat center center;background-size:cover;"></div>
							</div>
							<div class="panel-body">
								<h3 class="text-success"><small class="text-warning">{{$campaign->pengguna->name}}</small> @if($campaign->pengguna->status == 2)<i class="icon-badge"></i>@endif</h3>
								<h4>{{$campaign->judul}}</h4></h4>
								<p>{{$campaign->short_desc}}</p>
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
							<div class="panel-footer">
								<div class="row">
									<ul class="menu">
										<li>
											<h4 class="text-info">Rp{!! number_format($donasi, 0, ',', '.') !!}</h4>
											<span>Terkumpul</span>
										</li>
										<li>
											<h4 class="text-info">{!! number_format($persentase, 0, ',', '.') !!}%</h4>
											<span>Capaian</span>
										</li>
										<li>
											@if($campaign->deadline != null && $campaign->deadline != '')
											<h4 class="text-info">{!! $difference !!}</h4>
											<span>Hari lagi</span>
											@else
											<p class="text-info"><small>Tanpa Batas Akhir</small></p>
											@endif
										</li>
									</ul>
								</div>
							</div>
							<a href="{{url($campaign->link_campaign)}}"></a>
						</div>
					</div>
				@endforeach
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-10 col-md-3 center">
							<h3>{{ $campaigns->links() }}</h3>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
@endsection

@section('additional')


@endsection