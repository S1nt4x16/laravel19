<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index() 
    {
        $dashboard = DB::table('dashboard')
            ->select("id", "name", "judul", "isi")
            ->get();
        return view('post.index', ["dashboard" => $dashboard]);
    }

    public function create() 
    {
        return view('post.create');
    }

    
    public function store(Request $request)
        {
            $name = $request->input('name');
            $judul = $request->input('judul');
            $isi = $request->input('isi');
    
            DB::table('dashboard')
            ->insert([
                'name'=> $name,
                'judul'=> $judul,
                'isi'=> $isi,
                'created_at' => now()
            ]);
    
            return redirect()->route('dashboard_master');
        }

    public function delete($id) 
    {
        DB::table('dashboard')->where('id', $id)->delete();

        return redirect()->route('dashboard_master');
    }
}
