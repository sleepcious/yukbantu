<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        return view('admin.team');
    }
	
	public function data()
    {
        $teams = Team::select(['id', 'nama', 'posisi']);
		return Datatables::of($teams)
				->addColumn('actions', function ($team) {
					$edit = url('pengelola/team/edit/'.$team->id);
					$hapus = url('pengelola/team/del/'.$team->id);
					return '<div class="btn-group">
								<a href="'.$edit.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-pencil"></i></a>
								<a data-url="'.$hapus.'" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger btn-xs" title="hapus"><i class="icon-ban"></i></a>
							</div>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function baru(){
		return view('admin.teamadd');
	}
	
	public function insert(Request $request){
		$team = new Team;
		$team->nama = $request->nama;
		
		$team->posisi = $request->posisi;
		$team->facebook = $request->facebook;
		$team->instagram = $request->instagram;
		$team->twitter = $request->twitter;
		$team->google = $request->google;
		
		if($file = $request->hasFile('gambar')) {
			$file = $request->file('gambar') ;
			$fileName = str_replace(" ", "-", $file->getClientOriginalName());
			$destinationPath = public_path().'/team/';
			$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			$i = 1;
			while(file_exists($fileName)){
				$actualName = (string)$actualName.$i;
				$fileName = $actualName.'.'.$extension;
				$i++;
			}
			$file->move($destinationPath,$fileName);
			$team->gambar = '/team/'.$fileName;
		}
		if($team->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan team baru!");
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
					toastr.error("Gagal menambahkan team baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/team');
	}
	
	public function ubah($id){
		$team = Team::find($id);
		return view('admin.teamedit', ['team'=>$team]);
	}
	
	public function edit($id, Request $request){
		$team = Team::find($id);
		
		if($file = $request->hasFile('gambar')) {
			$file = $request->file('gambar') ;
			$fileName = str_replace(" ", "-", $file->getClientOriginalName());
			$destinationPath = public_path().'/team/';
			$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			$i = 1;
			while(file_exists($fileName)){
				$actualName = (string)$actualName.$i;
				$fileName = $actualName.'.'.$extension;
				$i++;
			}
			$file->move($destinationPath,$fileName);
			$gambar = '/team/'.$fileName;
			
			$updetan = array(
				'nama' => $request->nama,
				'posisi' => $request->posisi,
				'facebook' => $request->facebook,
				'instagram' => $request->instagram,
				'twitter' => $request->twitter,
				'google' => $request->google,
				'gambar' => $gambar
			);
		}else{
			$updetan = array(
				'nama' => $request->nama,
				'posisi' => $request->posisi,
				'facebook' => $request->facebook,
				'instagram' => $request->instagram,
				'twitter' => $request->twitter,
				'google' => $request->google
			);
		}
		if($team->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah team!");
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
					toastr.error("Gagal mengubah team!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/team');
	}
	
	public function hapus($id){
		$team = Team::find($id);
		$team->delete();
		return Redirect::to('pengelola/team');
	}
}
