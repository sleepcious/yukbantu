<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pages;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
        return view('admin.page');
    }
	
	public function data()
    {
        $pages = Pages::select(['id', 'name', 'url']);
		return Datatables::of($pages)
				->addColumn('actions', function ($page) {
					$edit = url('pengelola/setting/halaman/edit/'.$page->id);
					$hapus = url('pengelola/setting/halaman/del/'.$page->id);
					return '<div class="btn-group">
								<a href="'.$edit.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-pencil"></i> Ubah</a>
								<a data-url="'.$hapus.'" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger btn-xs" title="hapus"><i class="icon-ban"></i> Hapus</a>
							</div>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function baru(){
		return view('admin.pageadd');
	}
	
	public function tambah(Request $request){
		$page = new Pages;
		$page->name = $request->name;
		
		$url = $request->url;
		$cekurl = Kategori::where('url', 'like', '%'.$url.'%')->get()->count();
		$i = $cekurl + 1;
		if($cekurl != 0){
			$page->url = $url .'-'. (string) $i;       
		}else{
			$page->url = $url;
		}
		
		$page->konten = $request->konten;
		
		if($page->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan halaman baru!");
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
					toastr.error("Gagal menambahkan halaman baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/halaman');
	}
	
	public function ubah($id){
		$page = Pages::find($id);
		return view('admin.pageedit', ['page'=>$page]);
	}
	
	public function edit($id, Request $request){
		$page = Pages::find($id);
		
		$updetan = array(
				'name' => $request->name,
				'konten' => $request->konten
			);
		
		if($page->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah halaman!");
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
					toastr.error("Gagal mengubah halaman!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/halaman');
	}
	
	public function hapus($id){
		$page = Pages::find($id);
		
		if($page->delete()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menghapus halaman!");
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
					toastr.error("Gagal menghapus halaman!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/kategori');
	}
}
