<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;
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

        $pizzas = Pizza::paginate(5);
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
        // return edit view
        $pizza = Pizza::find($id);
        return view('admin.pizza.edit', ['pizza'=>$pizza]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, $id)
    {
        // Updating the pizza

        $pizza = Pizza::find($id);

        if($request->has('image')){
            $path = $request->image->store('public/pizza');
        } else {
            $path = $pizza->image_url;
        }
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_price = $request->small_price;
        $pizza->medium_price = $request->medium_price;
        $pizza->large_price = $request->large_price;
        $pizza->category = $request->category;
        $pizza->image_url = $path;
        $pizza->save();

        return redirect()->route('admin.pizza.index')->with('message', 'Pizza updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::find($id)->delete();
        return redirect()->route('admin.pizza.index')->with('message', 'Pizza deleted successfully.');
    }
}
