<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Partner;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
		return view('admin.partner');
    }
	
	public function data()
    {
        $partners = Partner::select(['id', 'name', 'url', 'no_telp', 'website']);
		return Datatables::of($partners)
				->addColumn('actions', function ($partner) {
					$edit = url('pengelola/partner/edit/'.$partner->id);
					$hapus = url('pengelola/partner/del/'.$partner->id);
					$detail = url('partner/'.$partner->url);
					return '<div class="btn-group">
								<a href="'.$detail.'" class="btn btn-tosca btn-xs" title="detail"><i class="icon-eye"></i> Detail</a>
								<a href="'.$edit.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-pencil"></i> Ubah</a>
								<a data-url="'.$hapus.'" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger btn-xs" title="hapus"><i class="icon-ban"></i> Hapus</a>
							</div>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function baru(){
		return view('admin.partneradd');
	}
	
	public function insert(Request $request){
		$partner = new Partner;
		$partner->name = $request->name;
		
		$url = $request->url;
		$cekurl = Partner::where('url', 'like', '%'.$url.'%')->get()->count();
		$i = $cekurl + 1;
		if($cekurl > 0){
			$partner->url = $url .'-'. (string) $i;       
		}else{
			$partner->url = $url;
		}
		
		$partner->no_telp = $request->no_telp;
		$partner->website = $request->website;
		$partner->biografi = $request->biografi;
		
		if($file = $request->hasFile('gambar')) {
			$file = $request->file('gambar') ;
			$fileName = str_replace(" ", "-", $file->getClientOriginalName());
			$destinationPath = public_path().'/partner/';
			$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			$i = 1;
			while(file_exists($fileName)){
				$actualName = (string)$actualName.$i;
				$fileName = $actualName.'.'.$extension;
				$i++;
			}
			$file->move($destinationPath,$fileName);
			$partner->gambar = '/partner/'.$fileName;
		}
		if($partner->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan partner baru!");
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
					toastr.error("Gagal menambahkan partner baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/partner');
	}
	
	public function ubah($id){
		$partner = Partner::find($id);
		return view('admin.partneredit', ['partner'=>$partner]);
	}
	
	public function edit($id, Request $request){
		$partner = Partner::find($id);
		
		if($file = $request->hasFile('gambar')) {
			$file = $request->file('gambar') ;
			$fileName = str_replace(" ", "-", $file->getClientOriginalName());
			$destinationPath = public_path().'/partner/';
			$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			$i = 1;
			while(file_exists($fileName)){
				$actualName = (string)$actualName.$i;
				$fileName = $actualName.'.'.$extension;
				$i++;
			}
			$file->move($destinationPath,$fileName);
			$gambar = '/partner/'.$fileName;
			
			$updetan = array(
				'name' => $request->name,
				'no_telp' => $request->no_telp,
				'website' => $request->website,
				'gambar' => $gambar,
				'biografi' => $request->biografi
			);
		}else{
			$updetan = array(
				'name' => $request->name,
				'no_telp' => $request->no_telp,
				'website' => $request->website,
				'biografi' => $request->biografi
			);
		}
		if($partner->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah partner!");
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
					toastr.error("Gagal mengubah partner!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/partner');
	}
	
	public function hapus($id){
		$partner = Partner::find($id);
		$partner->delete();
		return Redirect::to('pengelola/partner');
	}
}
