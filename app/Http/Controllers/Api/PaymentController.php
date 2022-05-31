<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();

        return $payment;
    }

    public function getId($id)
    {
        $payment = Payment::find($id);

        return $payment;
    }

    public function add(Request $request)
    {

        try {
            $payment = new Payment();

            $payment->name = $request->name;
            $payment->parcel = $request->parcel;

            $payment->save();

            return ['retorno'=>'Forma de pagamento criada com sucesso.'];

        } catch (\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $payment = Payment::find($id);

            $payment->name = $request->name;
            $payment->parcel = $request->parcel;


            $payment->save();

            return ['retorno'=>'ok', 'data'=>$request->all()];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id)
    {
        try {
            $payment = Payment::find($id);
            $payment->delete();

            return ['retorno'=>'ok'];

        } catch(\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

}
