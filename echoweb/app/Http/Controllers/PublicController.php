<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Campaign;
use App\CampaignUpdate;
use App\Donasi;
use App\Laporan;
use App\Pages;
use App\Payment;
use App\Pesan;
use App\Settings;
use App\Kategori;
use App\Team;
use App\Partner;
use Redirect;
use Session;
use Validator;

class PublicController extends Controller
{
    public function index(){
		return view('general.index');
	}
	
	public function campaign(){
		$campaigns = Campaign::where('status', 1)->paginate(9);
		return view('general.campaign', ['campaigns'=>$campaigns]);
	}
	
	public function campaignCat($slug){
		$kategori = Kategori::where('url', $slug)->first();
		$campaigns = Campaign::where([['kategori_id', $kategori->id], ['status', 1]])->paginate(9);
		return view('general.campaign', ['campaigns'=>$campaigns]);
	}
	
	public function otherCampaign(){
		$campaigns = Campaign::where([['kategori_id', null], ['status', 1]])->paginate(9);
		return view('general.campaign', ['campaigns'=>$campaigns]);
	}
	
	public function campaignDet($slug){
		$campaign = Campaign::where('link_campaign', $slug)->first();
		return view('general.campaigndet', ['campaign'=>$campaign]);
	}
	
	public function tim(){
		$teams = Team::paginate(15);
		return view('general.team', ['teams'=>$teams]);
	}
	
	public function rekanan(){
		$partners = Partner::all();
		return view('general.partner', ['partners'=>$partners]);
	}
	
	public function profil($id){
		$user = User::find($id);
		return view('general.profil', ['user'=>$user]);
	}
	
	public function berdonasi($slug){
		$campaign = Campaign::where('link_campaign', $slug)->first();
		return view('general.formdonasi', ['campaign'=>$campaign]);
	}
	
	public function donasiPost($slug, Request $request){
		$donasi = new Donasi;
		
	}
	
}
