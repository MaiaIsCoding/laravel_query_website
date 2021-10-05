<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function query()
    {
        $info_query = DB::table('info_carros')->get();
        return view('database', compact('info_query'));
    }

    public function delete_row()
    {
        $row = $_GET['id'];
        $info_query = DB::table('info_carros')
        ->where('id', $row)
        ->delete();

        $info_query = DB::table('info_carros')->get();
        return view('database', compact('info_query'));
    }
}
