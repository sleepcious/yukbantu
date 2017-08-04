<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Verifikasi;
use App\User;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminVerifikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
        return view('admin.verifikasi');
    }
	
	public function data()
    {
        $verifs = Verifikasi::select(['id', 'id_card', 'no_telp', 'status']);
		return Datatables::of($verifs)
				->addColumn('status', function($verif){
					if($verif->status == 1):
						return 'Request';
					elseif($verif->status == 2):
						return 'Proses';
					elseif($verif>status == 3):
						return 'Sukses';
					else:
						return 'Gagal';
					endif;
				})
				->addColumn('email', function($verif){
					return $verif->pengguna->email;
				})
				->addColumn('name', function($verif){
					return $verif->pengguna->name;
				})
				->addColumn('actions', function ($verif) {
					$detail = url('pengelola/setting/verifikasi/detail/'.$payment->id);
					return '<a href="'.$detail.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-eye"></i> Detail</a>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function indexPending()
    {
        return view('admin.verifikasipending');
    }
	
	public function dataPending()
    {
        $verifs = Verifikasi::select(['id', 'id_card', 'no_telp', 'status'])->where('status', 1);
		return Datatables::of($verifs)
				->addColumn('status', function($verif){
					if($verif->status == 1):
						return 'Request';
					elseif($verif->status == 2):
						return 'Proses';
					elseif($verif>status == 3):
						return 'Sukses';
					else:
						return 'Gagal';
					endif;
				})
				->addColumn('email', function($verif){
					return $verif->pengguna->email;
				})
				->addColumn('name', function($verif){
					return $verif->pengguna->name;
				})
				->addColumn('actions', function ($verif) {
					$detail = url('pengelola/setting/verifikasi/detail/'.$payment->id);
					return '<a href="'.$detail.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-eye"></i> Detail</a>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function detail($id){
		$verif = Verifikasi::find($id);
		return view('admin.verifikasidetail', ['verif'=>$verif]);
	}
	
	public function ubah($id, $stat){
		$verif = Verifikasi::find($id);
		$verif->update(['status'=>$stat]);
		
		$user = User::find($verif->user_id);
		
		if($stat == 3):
			$user->update(['status'=>2]);
			$status = 'TERVERIFIKASI';
			$user->notify(new VerifikasiStat($user->name, $status));
			
		elseif($stat == 4):
			$status = 'GAGAL';
			$user->notify(new VerifikasiStat($user->name, $status));
		endif;
		return Redirect::to('pengelola/verifikasi');
	}
}
