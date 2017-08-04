<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Campaign;
use App\CampaignUpdate;
use App\Donasi;
use App\Fundraiser;
use App\Laporan;
use App\Pages;
use App\Payment;
use App\Pesan;
use App\Settings;
use App\Kategori;
use Redirect;
use Session;
use Validator;
use Response;

use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
	
	public function campaign(Request $request){
		$campaigns = Campaign::paginate(15);
        if ($request->ajax()) {
            return view('admin.tabel.campaign', compact('campaigns'));
        }
		return view('admin.campaign',compact('campaigns'));
	}
	
	public function campaignCari(Request $request){
		$keyword = $request->keyword;
		$campaigns = Campaign::where('judul')->paginate(15);
        if ($request->ajax()) {
            return view('admin.tabel.campaign', compact('campaigns'));
        }
		return view('admin.campaign',compact('campaigns'));
	}
}
