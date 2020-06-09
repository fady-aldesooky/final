<?php

namespace App\Http\Controllers;

use App\Progect;
use Illuminate\Http\Request;


class ProgectController extends Controller
{
    public function index()
    {
        $Progects = Progect::all();
        return view('Progect.index', compact('Progects'));
    }
    public function create()
    {
        return view('Progect.index');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'Progecttitle'=>'required',
            'Progectdescription'=>'required',
            'Progectproductprice'=>'required',
        ]);
        $product =new Progect();
        $product->title = $request->Progecttitle;
        $product->description = $request->Progectdescription;
        $product->price = $request->Progectprice;
        $product ->save();

        return redirect()->back();

    }
    public function edit(Progect $progect)
    {

        return view('Progect.index',compact('Progect'));
    }
   public function update(Request $request , Progect $progect)
   {
    $request -> validate([
        'producttitle'=>'required',
        'productdescription'=>'required',
        'productprice'=>'required',
    ]);



    $progect->title = $request->progecttitle;
    $progect->description = $request->progectdescription;
    $progect->price = $request->progectprice;

        $progect ->save();

        return redirect('/progect');
   }
   public function destroy(Progect $progect){


    $progect->delete();
   return redirect('/progect');
   }
}
