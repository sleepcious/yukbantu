<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Sakubantu;
use App\Ambilsaku;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminRedeemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
		return view('admin.redeem');
    }
	
	public function data()
    {
        $redeems = Ambilsaku::select(['id', 'user_id', 'nominal', 'nama_bank', 'atas_nama', 'no_rek', 'currency', 'status', 'created_at']);
		return Datatables::of($redeems)
				->addColumn('email', function ($redeem) {
					return $deposit->pengguna->email;
                })
				->addColumn('nominal', function ($redeem) {
					if($redeem->currency == 1){
						return 'Rp'.number_format($redeem->nominal, 1, '.', ',');
					}else if($redeem->currency == 2){
						return '$'.number_format($redeem->nominal, 2, '.', ',');
					}else{
						return number_format($redeem->nominal, 1, '.', ',');
					}
                })
				->addColumn('status', function ($redeem) {
					if($redeem->status == 1){
						return 'Pending';
					}else if($wallet->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('actions', function ($redeem) {
					$proses = url('pengelola/wallet/redeem/'.$redeem->id.'/2');
					$selesai = url('pengelola/wallet/redeem/'.$redeem->id.'/3');
					$minta = url('pengelola/wallet/redeem/'.$redeem->id.'/1');
					if($deposit->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$proses.'">Proses</a></li>
										<li><a href="'.$proses.'">Selesai</a></li>
									</ul>
								</div>';
					}else if($deposit->status == 2){
						return '<a href="'.$selesai.'" class="btn btn-tosca btn-xs">Selesai</a>';
					}else{
						return 'Selesai';
					}
                })
				->addColumn('time', function ($deposit) {
					return date_format($deposit->created_at, 'd/m/Y H:i:s');
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function indexPending()
    {
		return view('admin.redeempending');
    }
	
	public function dataPending()
    {
        $redeems = Ambilsaku::select(['id', 'user_id', 'nominal', 'nama_bank', 'atas_nama', 'no_rek', 'currency', 'status', 'created_at'])->where('status', 1);
		return Datatables::of($redeems)
				->addColumn('email', function ($redeem) {
					return $deposit->pengguna->email;
                })
				->addColumn('nominal', function ($redeem) {
					if($redeem->currency == 1){
						return 'Rp'.number_format($redeem->nominal, 1, '.', ',');
					}else if($redeem->currency == 2){
						return '$'.number_format($redeem->nominal, 2, '.', ',');
					}else{
						return number_format($redeem->nominal, 1, '.', ',');
					}
                })
				->addColumn('status', function ($redeem) {
					if($redeem->status == 1){
						return 'Pending';
					}else if($wallet->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('actions', function ($redeem) {
					$proses = url('pengelola/wallet/redeem/'.$redeem->id.'/2');
					$selesai = url('pengelola/wallet/redeem/'.$redeem->id.'/3');
					$minta = url('pengelola/wallet/redeem/'.$redeem->id.'/1');
					if($deposit->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$proses.'">Proses</a></li>
										<li><a href="'.$proses.'">Selesai</a></li>
									</ul>
								</div>';
					}else if($deposit->status == 2){
						return '<a href="'.$selesai.'" class="btn btn-tosca btn-xs">Selesai</a>';
					}else{
						return 'Selesai';
					}
                })
				->addColumn('time', function ($deposit) {
					return date_format($deposit->created_at, 'd/m/Y H:i:s');
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function ubahStatus($id, $stat){
		$redeem = Ambilsaku::find($id);
		$redeem->update(['status'=>$stat]);
		if($stat == 3){
			$user = User::find($redeem->id);
			$user->notify(new RedeemSuccess($user->name));
			
			$wallet = new Sakubantu;
			$wallet->user_id = $redeem->user_id;
			$wallet->kredit = $redeem->nominal;
			$wallet->currency = $redeem->currency;
			$wallet->save();
		}
		return Redirect::to('/pengelola/wallet/redeem');
	}
}
