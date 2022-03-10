<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pizzas list

        $pizzas = Pizza::get();
        return view('admin.pizza.index', ['pizzas'=>$pizzas]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Index the create page
        return view('admin.pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request)
    {
        // Storing pizza info to database

        // Image store path
        $path = $request->image->store('public/pizzas');

        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_price' => $request->small_price,
            'medium_price' => $request->medium_price,
            'large_price' => $request->large_price,
            'category' => $request->category,
            'image_url' => $path,
        ]);

        return redirect()->route('admin.pizza.index')->with('message', 'Pizza added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
