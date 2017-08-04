<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kategori;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
        return view('admin.kategori');
    }
	
	public function data()
    {
        $categories = Kategori::select(['id', 'name', 'url']);
		return Datatables::of($categories)
				->addColumn('actions', function ($category) {
					$edit = url('pengelola/setting/kategori/edit/'.$category->id);
					$hapus = url('pengelola/setting/kategori/del/'.$category->id);
					return '<div class="btn-group">
								<a data-url="'.$edit.'" data-konten="'.$category->name.'" data-link="'.$category->url.'" data-toggle="modal" data-target="#cuData" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-pencil"></i> Ubah</a>
								<a data-url="'.$hapus.'" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger btn-xs" title="hapus"><i class="icon-ban"></i> Hapus</a>
							</div>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function tambah(Request $request){
		$category = new Kategori;
		$category->name = $request->name;
		
		$url = $request->url;
		$cekurl = Kategori::where('url', 'like', '%'.$url.'%')->get()->count();
		$i = $cekurl + 1;
		if($cekurl != 0){
			$category->url = $url .'-'. (string) $i;       
		}else{
			$category->url = $url;
		}
		
		if($category->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan kategori baru!");
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
					toastr.error("Gagal menambahkan kategori baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/kategori');
	}
	
	public function ubah($id, Request $request){
		$category = Kategori::find($id);
		
		$url = $request->url;
		$cekurl = Kategori::where('url', 'like', '%'.$url.'%')->get()->count();
		$i = $cekurl + 1;
		if($cekurl != 0){
			$url = $url .'-'. (string) $i;       
		}else{
			$url = $url;
		}
		$updetan = array(
				'name' => $request->name,
				'url' => $url
			);
		
		if($category->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah kategori!");
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
					toastr.error("Gagal mengubah kategori!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/kategori');
	}
	
	public function hapus($id){
		$category = Kategori::find($id);
		
		if($category->delete()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menghapus kategori!");
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
					toastr.error("Gagal menghapus kategori!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/kategori');
	}
}
