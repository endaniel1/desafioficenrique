<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Http\Requests\Communes\{AdminCreateCommuneRequest, AdminUpdateCommuneRequest};

class CommuneController extends Controller
{    
    /**
     * Instantiate a new controller instance.
     *  
     *  @return void
     **/
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

	/**
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $communes = Commune::all();
        //dd($communes);
        return view('admin.communes.index')->with('communes', $communes);
    }    

	/**
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function create()
    {
        $commune = new Commune;

        return view("admin.communes.create")
                ->with("commune", $commune);
    } 

	/**
	 *
	 * @param  \Illuminate\Http\Requests\Communes\AdminCreateCommuneRequest  $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(AdminCreateCommuneRequest $request)
    {
        //dd($request->all());

        $commune = Commune::create([
			'name' => $request->name,
			'description' => $request->description
		]);

        return redirect()->route('communes.index')->with('message', 'Comuna Agregada con éxito.');
    }    

	/**
	 *
	 * @param  \App\Models\Commune  $commune
	 * @return \Illuminate\Http\Response
	 */
    public function edit(Commune $commune)
    {
        return view("admin.communes.edit")
                ->with("commune", $commune);
    }    

	/**
	 *
	 * @param  \Illuminate\Http\Requests\Communes\AdminUpdateCommuneRequest  $request
	 * @param  \App\Models\Commune  $commune
	 * @return \Illuminate\Http\Response
	 */    
    public function update(AdminUpdateCommuneRequest $request, Commune $commune)
    {
        //dd($request->all());

        $commune->fill([
			'name' => $request->name,
			'description' => $request->description
		]);
        $commune->save();

        return redirect()->route('communes.index')->with('message', 'Comuna Actualizada con éxito.');
    }

	/**
	 *
	 * @param  \App\Models\Commune  $commune
	 * @return \Illuminate\Http\Response
	 */    
    public function delete(Commune $commune)
    {
        //dd("esta apueno de elimnar");
        $commune->delete();
        return redirect()->route('communes.index')->with('message', 'Comuna Eliminada con éxito.');
    }
    
}
