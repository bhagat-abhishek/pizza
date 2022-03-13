<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::user()->is_admin == 1) {
            return redirect()->route('admin.order.index');
        }

        $orders = Order::latest()->where('user_id', Auth::user()->id)->get();
        return view('home', ['orders' => $orders]);
    }
}
