<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\Items\{AdminCreateItemRequest, AdminUpdateItemRequest};

class ItemController extends Controller
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
        $items = Item::all();
        //dd($items);
        return view('admin.items.index')->with('items', $items);
    }
    
    public function create()
    {
        $item = new Item;

        return view("admin.items.create")
                ->with("item", $item);
    }
  
    public function store(AdminCreateItemRequest $request)
    {
        //dd($request->all());

        $item = Item::create([
			'name' => $request->name,
			'description' => $request->description
		]);

        return redirect()->route('items.index')->with('message', 'Rubro Agregado con éxito.');
    }
    
    public function edit(Item $item)
    {
        return view("admin.items.edit")
                ->with("item", $item);
    }
    
    
    public function update(AdminUpdateItemRequest $request, Item $item)
    {
        //dd($request->all());

        $item->fill([
			'name' => $request->name,
			'description' => $request->description
		]);
        $item->save();

        return redirect()->route('items.index')->with('message', 'Rubro Actualizado con éxito.');
    }

    public function delete(Item $item)
    {
        //dd("esta apueno de elimnar");
        $item->delete();
        return redirect()->route('items.index')->with('message', 'Rubro Eliminado con éxito.');
    }
}
