<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Stock;
use Illuminate\Http\Request;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all
        ('id','product', 'quantity', 'serialnum', 'price', 'category');
        return Inertia::render('Stock/Index', [
            'stocks' => $stock
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stock::create($request->validate([
            'product' => ['required', 'max:50'],
            'quantity' => ['required', 'max:50'],
            'serialnum' => ['required', 'max:50'],
            'price' => ['required', 'max:50'],
            'category' => ['required', 'max:50'],
   
          ]));
          
          return redirect()->route('stock.index')
          ->with('message', 'Stock added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return Inertia::render('Stock/Edit', [
            'stock' => $stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->validate([
            'product' => ['required', 'max:50'],
            'quantity' => ['required', 'max:50'],
            'serialnum' => ['required', 'max:50'],
            'price' => ['required', 'max:50'],
            'category' => ['required', 'max:50'],
        ]));
        
        return redirect()->route('stock.index')
            ->with('message', 'Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index')
        ->with('message', 'Stock deleted successfully');
    }
}
