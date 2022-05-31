<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;
use App\OrderItem;
use App\Product;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        try {

            $order = new Order();

            $order->customer_id = $request->customer_id;
            $order->payment_id = $request->payment_id;
            $order->total_order = $request->total_order;

            $order->save();

            foreach($request->itens as $item) {

                $orderItem = new OrderItem();

                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->total_price = $item['price'] * $item['quantity'];

                $orderItem->save();

                $this->downStock($item['id'], $item['quantity']);
            }


            return ['retorno'=>'Pedido Criado com sucesso.'];

        } catch (\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function list()
    {
       $result = \DB::select('
                SELECT
                    o.id,
                    o.total_order,
                    o.customer_id,
                    o.payment_id,
                    o.created_at,
                    c.name as customer_name,
                    c.email,
                    p.name as payment_name
                FROM orders o
                inner join customers c ON c.id = o.customer_id
                inner join payments p ON p.id = o.payment_id
        ');
        $result = collect($result)->map(function($x){ return (array) $x; })->toArray();

        $list = [];
        foreach($result as $key => $item) {
            $list[$key] = [
                'order_id' => $item['id'],
                'customer_id' => $item['customer_id'],
                'payment_id' => $item['payment_id'],
                'customer_name' => $item['customer_name'],
                'payment_name' => $item['payment_name'],
                'total_order' => $item['total_order'],
                'date_order' => $item['created_at'],
            ];

            //Busca os itens do pedido
            $itens = \DB::select('
                        SELECT
                            ori.id,
                            ori.quantity,
                            ori.price,
                            ori.total_price,
                            pd.id,
                            pd.name
                        FROM order_items  ori
                        inner join products pd ON pd.id = ori.product_id
                        WHERE order_id = ?', [$item['id']]);
            $itens = collect($itens)->map(function($x){ return (array) $x; })->toArray();

            $list[$key]['itens'] = $itens;

        }


        return $list;
    }

    private function downStock($product_id, $quantity)
    {

        $product = Product::find($product_id);

        /*baixa a quantidade do estoque */
        $product->quantity = $product->quantity - $quantity;
        $product->save();

    }
}
