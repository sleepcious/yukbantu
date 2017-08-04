<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Sakubantu;
use App\Isisaku;
use App\Settings;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminDepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
		return view('admin.deposit');
    }
	
	public function data()
    {
        $deposits = Isisaku::select(['id', 'user_id', 'nominal', 'payment_id', 'kode_unik', 'currency', 'status', 'created_at']);
		return Datatables::of($deposits)
				->addColumn('email', function ($deposit) {
					return $deposit->pengguna->email;
                })
				->addColumn('nominal', function ($deposit) {
					if($deposit->currency == 1){
						return 'Rp'.number_format($deposit->nominal, 1, '.', ',');
					}else if($deposit->currency == 2){
						return '$'.number_format($deposit->nominal, 2, '.', ',');
					}else{
						return number_format($deposit->nominal, 1, '.', ',');
					}
                })
				->addColumn('payment', function ($deposit) {
					return $deposit->pembayaran->name;
                })
				->addColumn('status', function ($deposit) {
					if($deposit->status == 1){
						return 'Pending';
					}else if($deposti->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('actions', function ($deposit) {
					$paid = url('pengelola/wallet/topup/'.$deposit->id.'/2');
					$gagal = url('pengelola/wallet/topup/'.$deposit->id.'/3');
					$pending = url('pengelola/wallet/topup/'.$deposit->id.'/1');
					if($deposit->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$paid.'">Paid</a></li>
										<li><a href="'.$gagal.'">Gagal</a></li>
									</ul>
								</div>';
					}else if($deposit->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
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
		return view('admin.depositpending');
    }
	
	public function dataPending()
    {
        $deposits = Isisaku::select(['id', 'user_id', 'nominal', 'payment_id', 'kode_unik', 'currency', 'status', 'created_at'])->where('status', 1);
		return Datatables::of($deposits)
				->addColumn('email', function ($deposit) {
					return $deposit->pengguna->email;
                })
				->addColumn('nominal', function ($deposit) {
					if($deposit->currency == 1){
						return 'Rp'.number_format($deposit->nominal, 1, '.', ',');
					}else if($deposit->currency == 2){
						return '$'.number_format($deposit->nominal, 2, '.', ',');
					}else{
						return number_format($deposit->nominal, 1, '.', ',');
					}
                })
				->addColumn('payment', function ($deposit) {
					return $deposit->pembayaran->name;
                })
				->addColumn('status', function ($deposit) {
					if($deposit->status == 1){
						return 'Pending';
					}else if($deposti->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('actions', function ($deposit) {
					$paid = url('pengelola/wallet/topup/'.$deposit->id.'/2');
					$gagal = url('pengelola/wallet/topup/'.$deposit->id.'/3');
					$pending = url('pengelola/wallet/topup/'.$deposit->id.'/1');
					if($deposit->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$paid.'">Paid</a></li>
										<li><a href="'.$gagal.'">Gagal</a></li>
									</ul>
								</div>';
					}else if($deposit->status == 2){
						return 'Paid';
					}else{
						return 'Gagal';
					}
                })
				->addColumn('time', function ($deposit) {
					return date_format($deposit->created_at, 'd/m/Y H:i:s');
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function ubahStatus($id, $stat){
		$deposit = Isisaku::find($id);
		$deposit->update(['status'=>$stat]);
		if($stat == 2){
			$user = User::find($deposit->user_id);
			$user->notify(new DepositPaid($user->name));
			
			$wallet = new Sakubantu;
			$wallet->user_id = $deposit->user_id;
			$wallet->debet = $deposit->nominal;
			$wallet->currency = $deposit->currency;
			$wallet->save();
		}
		return Redirect::to('/pengelola/wallet/topup');
	}
}
