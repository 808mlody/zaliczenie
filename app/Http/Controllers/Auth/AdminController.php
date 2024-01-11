<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminController extends Controller
{
    public function product()
    {
        return view('auth.product');
    }

    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->zdjecie = $imagename;
        $data->nazwa = $request->Name;
        $data->cena = $request->Price;
        $data->ilosc = $request->Quantity;

        $data->save();
        return redirect()->back()->with('message', 'Produkt dodano pomyślnie!');
    }

    public function showproduct()
    {
        $products = Product::paginate(10);
        return view('auth.showproduct', ['products' => $products]);
    }

    public function deleteproduct($id)
    {
        $products=Product::find($id);
        $products->delete();
        return redirect()->back()->with('message', 'Produkt usunięto  pomyślnie!');;
    }

    public function updateview($id)
    {
        $products=Product::find($id);
        return view('auth.updateview',compact('products'));
    }

    public function updateproduct(Request $request, $id)
    {
        $products=Product::find($id);
        $image = $request->file;

        if($image)
        {
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $products->zdjecie = $imagename;
        }
        $products->nazwa = $request->Name;
        $products->cena = $request->Price;
        $products->ilosc = $request->Quantity;

        $products->save();
        return redirect()->back()->with('message', 'Produkt zedytowano pomyślnie!');
    }
}