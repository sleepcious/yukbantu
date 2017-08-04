<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Settings;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AdminSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	
	public function sliderIndex(){
		$sliders = Settings::where('meta_name', 'slider')->get();
		return view('admin.slider', ['sliders' => $sliders]);
    }
	
	public function sliderAdd(){
		return view('admin.slideradd');
	}
	
	public function sliderInsert(Request $request){
		$slider = new Settings;
		$slider->meta_name = 'slider';
		$slider->url = $request->url;
		$slider->tipe = 2;
		
		$file = $request->file('gambar') ;
		$fileName = str_replace(" ", "-", $file->getClientOriginalName());
		$destinationPath = public_path().'/slider/';
		$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
		$extension = pathinfo($fileName, PATHINFO_EXTENSION);
		$i = 1;
		while(file_exists($fileName)){
			$actualName = (string)$actualName.$i;
			$fileName = $actualName.'.'.$extension;
			$i++;
		}
		$file->move($destinationPath,$fileName);
		$slider->gambar = '/slider/'.$fileName;
		if($slider->save()){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil menambahkan slider baru!");
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
					toastr.error("Gagal menambahkan slider baru!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/slideshow');
	}
	
	public function sliderDel($id){
		$slider = Settings::find($id);
		$slider->delete();
		return Redirect::to('pengelola/setting/slideshow');
	}
	
	public function sliderEdit($id){
		$slider = Settings::find($id);
		return view('admin.slideredit', ['slider'=>$slider]);
	}
	
	public function sliderUpdate($id, Request $request){
		$slider = Settings::find($id);
		$url = $request->url;
		
		if($file = $request->hasFile('gambar')) {
			$file = $request->file('gambar') ;
			$fileName = str_replace(" ", "-", $file->getClientOriginalName());
			$destinationPath = public_path().'/slider/';
			$actualName = str_replace(" ", "-", pathinfo($fileName,PATHINFO_FILENAME));
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			$i = 1;
			while(file_exists($fileName)){
				$actualName = (string)$actualName.$i;
				$fileName = $actualName.'.'.$extension;
				$i++;
			}
			$file->move($destinationPath,$fileName);
			$gambar = '/slider/'.$fileName;
			
			$updetan = array(
				'url' => $url,
				'gambar' => $gambar
			);
		}else{
			$updetan = array(
				'url' => $url
			);
		}
		
		if($slider->update($updetan)){
			Session::flash('flash_message', '
				setTimeout(function() {
					toastr.options = {
						closeButton: true,
						progressBar: true,
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						timeOut: 5000
					};
					toastr.success("Berhasil mengubah slider!");
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
					toastr.error("Gagal mengubah slider!");
				}, 1800);
			');
		}
		return Redirect::to('pengelola/setting/slideshow');
	}
}
