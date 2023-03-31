<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentFile;
use App\Models\Commune;
use App\Models\Item;
use App\Http\Requests\DocumentFile\{AdminCreateDocumentFileRequest, AdminUpdateDocumentFileRequest};

class DocumentFileController extends Controller
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
    
   public function index()
   {
       $document_files = DocumentFile::all();
       //dd($document_file);
       return view('admin.document_files.index')->with('document_files', $document_files);
   }
   
   public function create()
   {
       $document_file = new DocumentFile;
       $communes = Commune::all();
       $items = Item::all();
       
       return view("admin.document_files.create")
                ->with("document_file", $document_file)
                ->with("communes", $communes)
                ->with("items", $items);
   }

   public function store(AdminCreateDocumentFileRequest $request)
   {
        //dd($request->all());
        $document_file = DocumentFile::create([
            'item_id' => $request->item,
            'commune_id' => $request->commune,
            'documents' => $request->document_archive
        ]);

        return redirect()->route('document_files.index')->with('message', 'Documento de Archivo Agregado con éxito.');
   }   
    
   public function edit(DocumentFile $document_file)
   {
        $communes = Commune::all();
        $items = Item::all();
        return view("admin.document_files.edit")
                ->with("document_file", $document_file)
                ->with("communes", $communes)
                ->with("items", $items);
   }
   
   public function update(AdminUpdateDocumentFileRequest $request, DocumentFile $document_file)
   {
       //dd($request->all());
       
       $document_file->fill([
        'item_id' => $request->item,
        'commune_id' => $request->commune,
        'documents' => $request->document_archive
       ]);
       $document_file->save();

       return redirect()->route('document_files.index')->with('message', 'Documento de Archivo Actualizado con éxito.');
   }


   public function delete(DocumentFile $document_file)
   {
       //dd("esta apueno de elimnar");
       $document_file->delete();
       return redirect()->route('document_files.index')->with('message', 'Documento de Archivo Eliminado con éxito.');
   }
 

}
