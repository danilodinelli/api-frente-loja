<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return $product;
    }

    public function getId($id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function add(Request $request)
    {

        try {
            $product = new Product();

            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;

            $product->save();

            return ['retorno'=>'Produto criado com sucesso.'];

        } catch (\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $product = Product::find($id);

            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;


            $product->save();

            return ['retorno'=>'ok', 'data'=>$request->all()];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            return ['retorno'=>'Produto excluído com sucesso.'];

        } catch(\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }
}
