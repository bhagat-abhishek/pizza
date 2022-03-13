<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request) {

        // dd($request->category);
        if(!$request->category) {
            $pizzas = Pizza::latest()->get();
            return view('frontend.index', ['pizzas'=>$pizzas]);
        }
        $pizzas = Pizza::where('category', $request->category)->get();
            return view('frontend.index', ['pizzas'=>$pizzas]);
    }

    public function show($id) {
        $pizza = Pizza::find($id);
        return view('frontend.show', ['pizza'=>$pizza]);
    }

    public function store(Request $request) {
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza ==0){
            return back()->with('error', 'Please order atleast one pizza');
        }
        if($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0){
            return back()->with('error', 'Order cannot be a negetive');
        }

        Order::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'body' => $request->body,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Your order is placed successfully');
    }
}
