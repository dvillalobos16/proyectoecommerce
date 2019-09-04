<?php

namespace ecommerce\Http\Controllers;

use Illuminate\Http\Request;

use ecommerce\Products;

class ProductsController extends Controller
{
    public function __construct()
    {
    }
    public function getAll(){
        $products = Products::all();
        return $products;
    }

    public function getById($id){
        $products = Products::find($id);
        return $products;
    }

    public function add(Request $request){
        $products = Products::create($request->all());
        return $products;
    }

    public function edit($id, Request $request){
        $products = $this->getById($id); //reuse method
        $products->fill($request->all())->save();
        return $products;
    }

    public function delete($id){
        $products = $this->getById($id); //reuse method
        $products->delete();
        return $products;
    }

    public function likeAction($id)
    {
        Products::where('id', $id)->increment('likes_count');
        $products = $this->getById($id);
        return $products;
    }
    public function dislikeAction($id)
    {
        Products::where('id', $id)->decrement('likes_count');
        $products = $this->getById($id);
        return $products;
    }


    /*public function allTrash(){
        $products = Products::onlyTrashed()->get();
        return $products;
    }*/
}
