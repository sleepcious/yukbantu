<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Sakubantu;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminSakuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
		return view('admin.saku');
    }
	
	public function data()
    {
        $wallets = Sakubantu::select(['id', 'user_id', 'debet', 'kredit', 'currency', 'created_at']);
		return Datatables::of($wallets)
				->addColumn('email', function ($wallet) {
					return $wallet->pengguna->email;
                })
				->addColumn('debet', function ($wallet) {
					if($wallet->currency == 1){
						return 'Rp'.number_format($wallet->debet, 1, '.', ',');
					}else if($wallet->currency == 2){
						return '$'.number_format($wallet->debet, 2, '.', ',');
					}else{
						return number_format($wallet->debet, 1, '.', ',');
					}
                })
				->addColumn('kredit', function ($wallet) {
					if($wallet->currency == 1){
						return 'Rp'.number_format($wallet->kredit, 1, '.', ',');
					}else if($wallet->currency == 2){
						return '$'.number_format($wallet->kredit, 2, '.', ',');
					}else{
						return number_format($wallet->kredit, 1, '.', ',');
					}
                })
				->addColumn('time', function ($wallet) {
					return date_format($wallet->created_at, 'd/m/Y H:i:s');
                })
                ->make(true);
    }
}
