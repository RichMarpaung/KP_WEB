<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function placelist()
    {
        $places = Place::withAvg('reviews', 'rating') // Mengambil rata-rata rating
        ->withCount('reviews') // Mengambil total review
        ->get();
        return view('admin.placelist',compact('places'));
    }
    public function placecreate()
    {

        return view('admin.addplace');
    }

    public function upload(Request $request)
    {
        $validasi = $request->validate(
            ['name'=>'required',
            'email' => 'required',
            'password'=> 'required',
            'role_id'=> 'required',
            'status'=> 'required',
            'confirm_password' => 'required',
        ]);
        if(!$validasi ){
            Session::flash('status', 'field');
            Session::flash('massage', 'Periksa Data Anda Kembali');
            return redirect(route('admin.user.create'))->with('Gagal', 'Data gagal ');
            // return view('loginPage.register');
        }
        if($request->password != $request->confirm_password){
            Session::flash('status', 'field');
            Session::flash('massage', 'Password tidak sama !!');
            return redirect(route('admin.user.create'))->with('Gagal', 'Data gagal ');
            // return view('loginPage.register');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'status' =>$request->status,
            'password' =>Hash::make($request->password) ,
        ]);
        Session::flash('status', 'success');
        Session::flash('massage', 'Akun Berhasil Didaftarkan Silahkan Login!');
        return redirect(route('admin.user.list'))->with('success', 'Data produk berhasil diperbarui');
    }
    public function dashboard()
    {
        $user = User::count();
        $place = Place::count();
        $review = Review::count();
        return view('admin/dashboard',[
            'user' => $user,
            'place' => $place,
            'review' => $review
        ]);
    }
}
