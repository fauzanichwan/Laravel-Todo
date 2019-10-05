<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller {
    
  public function index() {
    $items = Item::all();
    return view('item.index', compact('items'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required'
    ]);

    Item::create([
      'name' => $request->name
    ]);

    return redirect('/')->with('msgSuccess', 'Succesfully to insert !');
  }
  
  public function destroy($id) {
    $item = Item::find($id);
    $item->delete();
    return redirect('/')->with('msgSuccess', 'Succesfully to delete !');
  }

  public function destroySelected(Request $request) {
    if ($request->check) {
      Item::whereIn('id', $request->check)->delete();
      return redirect('/')->with('msgSuccess', 'Succesfully to delete !');
    } else {
      return redirect('/')->with('msg', 'Please choose at least one !');
    }
  }

  public function destroyAll() {
    Item::truncate();
    return redirect('/')->with('msgSuccess', 'Succesfully to delete !');
  }

}
