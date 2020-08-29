<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('user')->get();;
        return view('listarProdutos', [
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->get();
        if(count($products) > 0){
            return view('resultadoBusca')->withDetails($products)->withQuery($search);
        }else{
            return view('resultadoBusca')->withMessage('Nenhum resultado encontrado');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarProduto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $userId = Auth::user()->id;
        $product = new Product();
        $product->user_id = $userId;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
