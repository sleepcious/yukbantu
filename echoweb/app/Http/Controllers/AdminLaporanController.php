<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Campaign;
use App\Laporan;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminLaporanController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
		return view('admin.laporan');
    }
	
	public function data()
    {
        $reports = Laporan::select(['id','user_id', 'email', 'campaign_id', 'komentar']);
		return Datatables::of($reports)
                ->addColumn('user', function ($report) {
                    return $report->user_id ? $report->pengguna->name : '';
                })
				->addColumn('campaign', function ($report) {
                    return $report->campaign_id ? str_limit($report->kampanye->judul, 20, '...') : '';
                })
				->addColumn('detail', function ($report) {
					$url = url('pengelola/laporan/'.$report->id);
					return '<a href="'.$url.'" class="btn btn-tosca">Detail</a>';
                })
				->rawColumns(['detail'])
                ->make(true);
    }
	
	public function detail($id){
		$laporan = Laporan::find($id);
		return view('admin.laporandetail', ['laporan' => $laporan]);
	}
}
