<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        $user=auth()->user();
        $count=cart::where('name',$user->name)->count();


        return view('user.home', compact('products','count'));
    }
    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=auth()->user();
            $product=Product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->nazwa=$product->nazwa;
            $cart->cena=$product->cena;
            $cart->ilosc=$request->ilosc;
            $cart->save();

            
            return redirect()->back()->with('message', 'Produkt dodano do koszyka!');
        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart(){

        $user=auth()->user();
        $cart=cart::where('name',$user->name)->get();
        $count=cart::where('name',$user->name)->count();

        return view('user.showcart',compact('count','cart'));
    }


}
