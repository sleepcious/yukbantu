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

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
		return view('admin.users');
    }
	public function data()
    {
        $users = User::select(['id', 'name', 'email', 'tipe', 'role', 'status']);
		return Datatables::of($users)
				->addColumn('tipe', function ($user) {
					if($user->tipe != null && $user->tipe != ''){
						return 'Organisasi';
					}else{
						return 'Personal';
					}
                })
				->addColumn('status', function ($user) {
					if($user->tipe == 2){
						return 'Terverifikasi';
					}else{
						return 'Terdaftar';
					}
                })
				->addColumn('role', function ($user) {
					if($user->role == 1){
						return 'Admin';
					}else{
						return 'User';
					}
                })
				->addColumn('actions', function ($user) {
					$url = url('pengelola/pengguna/edit/'.$user->id);
					return '<a href="'.$url.'" class="btn btn-tosca btn-xs">Ubah</a>';
				})
				->rawColumns(['actions'])
                ->make(true);
    }
	public function ubah($id){
		$user = User::find($id);
		return view('admin.useredit', ['user'=>$user]);
	}
	public function update($id, Request $request){
		$user = User::find($id);
		$updetan = array(
			'name' => $request->name,
			'email' => $request->email,
			'lokasi' => $request->lokasi,
			'no_telp' => $request->no_telp,
			'tipe' => $request->tipe,
			'role' => $request->role,
			'partner_id' => $request->partner,
			'status' => $request->status
		);
		if($user->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah user!");
				}, 1800);
			');
		}else{
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.error("Gagal mengubah user!");
				}, 1800);
			');
		}
		return Redirect::to('/pengelola/pengguna');
	}
}
