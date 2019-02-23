<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function daftar(Request $req)
    {
    	$data = Kategori::where('nama_kategori','like',"%{$req->keyword}%")
    			->paginate(10);
    	return view('admin.pages.kategori.daftar',['data'=>$data]);
    }

    public function add()
    {
    	return view('admin.pages.kategori.add');
    }

    public function save(Request $req)
    {
        \Validator::make($req->all(),[
            'kategori'=>'required|between:3,100|unique:kategori,nama_kategori',
        ])->validate();
    	return 'Fungsi Save';
    }
}
