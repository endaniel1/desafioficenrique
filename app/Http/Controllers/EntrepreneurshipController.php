<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrepreneurship;
use App\Models\DocumentFile;
use App\Models\Commune;
use App\Models\Item;
use App\Http\Requests\DocumentFile\{AdminCreateEntrepreneurshipRequest, AdminUpdateEntrepreneurshipRequest};
use Auth;

class EntrepreneurshipController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *  
     *  @return void
     **/
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    
    public function create()
    {
        $entrepreneurship = new Entrepreneurship;
        $communes = Commune::all();
        $items = Item::all();

        return view("admin.entrepreneurships.create")
                ->with("communes", $communes)
                ->with("items", $items)
                ->with("entrepreneurship", $entrepreneurship);
    }
  
    public function store(Request $request)
    {
        //dd($request->all());
        $archive = DocumentFile::where("item_id", "=", $request->item)
                    ->where("commune_id", "=", $request->commune)->first();

        if($archive){
            
            $entrepreneurship = Entrepreneurship::create([
                'user_id' => auth()->user()->id,
                'item_id' => $request->item,
                'commune_id' => $request->commune,
                'document_file_id' => $archive->id,
                'description' => $request->description
            ]);

            return redirect()->route('entrepreneurships.previous', $entrepreneurship);
        }else{
            //dd("hola");
            return redirect()->back()->with('errorDocument', 'Los documentos para esa comuna y rubro son invalido!');
        }

        

        return redirect()->route('communes.index')->with('message', 'Comuna Agregada con éxito.');
    }
    
    public function previous(Entrepreneurship $entrepreneurship)
    {
        $entrepreneurship->item;
        $entrepreneurship->commune;
        $documentFiles = explode(",", $entrepreneurship->documentFile->documents);

       // dd($documentFile);
        return view("admin.entrepreneurships.previousDocument")
                ->with("entrepreneurship", $entrepreneurship)
                ->with("documentFiles", $documentFiles);
    }

    public function edit(Entrepreneurship $entrepreneurship)
    {
        if(!Auth::user()->isRol("admin"))
        {
            abort(404);
        }
        $communes = Commune::all();
        $items = Item::all();

        $entrepreneurship->item;
        $entrepreneurship->commune;
        $documentFiles = explode(",", $entrepreneurship->documentFile->documents);

        return view("admin.entrepreneurships.edit")
                ->with("communes", $communes)
                ->with("items", $items)
                ->with("entrepreneurship", $entrepreneurship)
                ->with("documentFiles", $documentFiles);
    }
    
    
    public function update(Request $request, Entrepreneurship $entrepreneurship)
    {        
        if(!Auth::user()->isRol("admin"))
        {
            abort(404);
        }

        $entrepreneurship->fill([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item,
            'commune_id' => $request->commune,
            'description' => $request->description,
            'status' => $request->status
        ]);
        $entrepreneurship->save();

        return redirect()->route('dashboard')->with('message', 'Emprendimiento Actualizado con éxito.');
    }

}
