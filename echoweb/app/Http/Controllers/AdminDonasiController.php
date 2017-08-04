<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Campaign;
use App\Donasi;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminDonasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
		return view('admin.donasi');
    }
	
	public function data()
    {
        $donations = Donasi::select(['id', 'campaign_id', 'nominal', 'email', 'payment_id', 'kode_unik', 'currency', 'status']);
		return Datatables::of($donations)
				->addColumn('campaign', function ($donation) {
                    return $donation->campaign_id ? $donation->kampanye->judul : '';
                })
				->addColumn('status', function ($donation) {
					if($donation->status == 1){
						return 'Pending';
					}else if($donation->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('nominal', function ($donation) {
					if($donation->currency == 1){
						return 'Rp'.number_format($donation->nominal, 1, '.', ',');
					}else if($donation->currency == 2){
						return '$'.number_format($donation->nominal, 2, '.', ',');
					}else{
						return number_format($donation->nominal, 1, '.', ',');
					}
                })
				->addColumn('payment', function ($donation) {
                    return $donation->payment_id ? $donation->pembayaran->name : '';
                })
				->addColumn('actions', function ($donation) {
					$paid = url('pengelola/donasi/'.$donation->id.'/2');
					$gagal = url('pengelola/donasi/'.$donation->id.'/3');
					$pending = url('pengelola/donasi/'.$donation->id.'/1');
					if($donation->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$paid.'">Paid</a></li>
										<li><a href="'.$gagal.'">Gagal</a></li>
									</ul>
								</div>';
					}else if($donation->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
				})
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function indexPending()
    {
		return view('admin.donasipending');
    }
	
	public function dataPending()
    {
        $donations = Donasi::select(['id', 'campaign_id', 'nominal', 'email', 'payment_id', 'kode_unik', 'currency', 'status'])->where('status', 1);
		return Datatables::of($donations)
				->addColumn('campaign', function ($donation) {
                    return $donation->campaign_id ? $donation->kampanye->judul : '';
                })
				->addColumn('status', function ($donation) {
					if($donation->status == 1){
						return 'Pending';
					}else if($donation->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('nominal', function ($donation) {
					if($donation->currency == 1){
						return 'Rp'.number_format($donation->nominal, 1, '.', ',');
					}else if($donation->currency == 2){
						return '$'.number_format($donation->nominal, 2, '.', ',');
					}else{
						return number_format($donation->nominal, 1, '.', ',');
					}
                })
				->addColumn('payment', function ($donation) {
                    return $donation->payment_id ? $donation->pembayaran->name : '';
                })
				->addColumn('actions', function ($donation) {
					$paid = url('pengelola/donasi/'.$donation->id.'/2');
					$gagal = url('pengelola/donasi/'.$donation->id.'/3');
					$pending = url('pengelola/donasi/'.$donation->id.'/1');
					if($donation->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$paid.'">Paid</a></li>
										<li><a href="'.$gagal.'">Gagal</a></li>
									</ul>
								</div>';
					}else if($donation->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
				})
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function ubahStatus($id, $stat){
		$donasi = Donasi::find($id);
		$donasi->update(['status'=>$stat]);
		if($stat == 2){
			$donasi->notify(new DonasiPaid($donasi->name, $donasi->kampanye->judul));
		}
		return Redirect::to('/pengelola/donasi');
	}
}
