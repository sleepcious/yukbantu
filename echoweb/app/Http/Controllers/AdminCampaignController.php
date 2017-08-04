<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Campaign;
use App\Kategori;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminCampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
		return view('admin.campaign');
    }
	
    public function data()
    {
        $campaigns = Campaign::select(['id','user_id', 'judul', 'target_dana', 'link_campaign', 'deadline', 'kategori_id', 'status']);
		return Datatables::of($campaigns)
                ->addColumn('user', function ($campaign) {
                    return $campaign->user_id ? str_limit($campaign->pengguna->name, 15, '...') : '';
                })
				->addColumn('kategori', function ($campaign) {
                    return $campaign->kategori_id ? $campaign->kelompok->name : '';
                })
				->addColumn('status', function ($campaign) {
					if($campaign->status == 1){
						return 'Publish';
					}else if($campaign->status == 2){
						return 'Review';
					}else{
						return 'Selesai';
					}
                })
				->addColumn('deadline', function ($campaign) {
					$deadline = new Carbon($campaign->deadline);
					return $deadline->format('d/m/y');
                })
				->addColumn('target_dana', function ($campaign) {
                    return number_format($campaign->target_dana, 1, '.', ',');
                })
				->addColumn('actions', function ($campaign) {
					$review = url('pengelola/campaign/'.$campaign->id.'/2');
					$selesai = url('pengelola/campaign/'.$campaign->id.'/3');
					$publish = url('pengelola/campaign/'.$campaign->id.'/1');
					if($campaign->status == 1){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$review.'">Review</a></li>
										<li><a href="'.$selesai.'">Selesai</a></li>
										<li class="divider"></li>
										<li><a href="'.url($campaign->link_campaign).'">Detail</a></li>
									</ul>
								</div>';
					}else if($campaign->status == 2){
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$publish.'">Publish</a></li>
										<li><a href="'.$selesai.'">Selesai</a></li>
										<li class="divider"></li>
										<li><a href="'.url($campaign->link_campaign).'">Detail</a></li>
									</ul>
								</div>';
					}else{
						return '<div class="btn-group">
									<button type="button" class="btn btn-tosca btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="'.$publish.'">Publish</a></li>
										<li><a href="'.$review.'">Review</a></li>
										<li class="divider"></li>
										<li><a href="'.url($campaign->link_campaign).'">Detail</a></li>
									</ul>
								</div>';
					}
				})
				->rawColumns(['actions'])
                ->make(true);
    }
	public function ubahStatus($id, $stat){
		$campaign = Campaign::find($id);
		$campaign->update(['status'=>$stat]);
		$user = User::find($campaign->user_id);
		if($stat == 2){
			$user->notify(new CampaignStat($user->name));
		}
		return Redirect::to('/pengelola/campaign');
	}
}
