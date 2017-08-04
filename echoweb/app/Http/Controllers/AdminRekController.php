<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminRekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function index()
    {
        return view('admin.rekening');
    }
	
	public function data()
    {
        $payments = Payment::select(['id', 'name', 'rekening', 'cabang', 'atas_nama']);
		return Datatables::of($payments)
				->addColumn('actions', function ($payment) {
					$edit = url('pengelola/setting/rekening/edit/'.$payment->id);
					$hapus = url('pengelola/setting/rekening/del/'.$payment->id);
					return '<div class="btn-group">
								<a href="'.$edit.'" class="btn btn-ijo btn-xs" title="Edit"><i class="icon-pencil"></i> Ubah</a>
								<a data-url="'.$hapus.'" href="#" data-toggle="modal" data-target="#hapusData" class="btn btn-danger btn-xs" title="hapus"><i class="icon-ban"></i> Hapus</a>
							</div>';
                })
				->rawColumns(['actions'])
                ->make(true);
    }
	
	public function baru(){
		return view('admin.rekeningadd');
	}
	
	public function tambah(Request $request){
		$payment = new Payment;
		$payment->name = $request->name;
		$payment->rekening = $request->rekening;
		$payment->cabang = $request->cabang;
		$payment->atas_nama = $request->atas_nama;
		
		if($payment->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan cara pembayaran baru!");
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
					toastr.error("Gagal menambahkan cara pembayaran baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/rekening');
	}
	
	public function ubah($id){
		$payment = Payment::find($id);
		return view('admin.rekeningedit', ['payment'=>$payment]);
	}
	
	public function edit($id, Request $request){
		$payment = Payment::find($id);
		
		$updetan = array(
				'name' => $request->name,
				'rekening' => $request->konten,
				'cabang' => $request->konten,
				'atas_nama' => $request->atas_nama
			);
		
		if($payment->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah cara pembayaran!");
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
					toastr.error("Gagal mengubah cara pembayaran!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/rekening');
	}
	
	public function hapus($id){
		$payment = Payment::find($id);
		
		if($payment->delete()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menghapus cara pembayaran!");
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
					toastr.error("Gagal menghapus cara pembayaran!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/rekening');
	}
}
