<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrepreneurship;
use App\Models\DocumentFile;
use App\Models\Commune;
use App\Models\Item;
use Auth;

class DashboardController extends Controller
{
	/**
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index(){
        if(Auth::user()->isRol("admin"))
        {
            $entrepreneurships = Entrepreneurship::all();
        }
        else
        {
            $entrepreneurships = Entrepreneurship::where('user_id', '=', Auth::user()->id)->get();
            //dd($entrepreneurships );
        }
        return view('dashboard')->with('entrepreneurships', $entrepreneurships);
    }
}
