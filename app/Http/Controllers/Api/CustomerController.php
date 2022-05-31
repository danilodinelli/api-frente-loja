<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();

        return $customer;
    }

    public function getId($id)
    {
        $customer = Customer::find($id);

        return $customer;
    }

    public function add(Request $request)
    {

        try {
            $customer = new Customer();

            $customer->name = $request->name;
            $customer->cpf = $request->cpf;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->zip_code = $request->zip_code;
            $customer->neighborhood = $request->neighborhood;
            $customer->number = $request->neighborhood;
            $customer->complement = $request->neighborhood;

            $customer->save();

            return ['retorno'=>'Cliente criado com sucesso'];

        } catch (\Exception $erro) {
            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $customer = Customer::find($id);

            $customer->name = $request->name;
            $customer->cpf = $request->cpf;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->zip_code = $request->zip_code;
            $customer->neighborhood = $request->neighborhood;
            $customer->number = $request->neighborhood;
            $customer->complement = $request->neighborhood;

            $customer->save();

            return ['retorno'=>'ok', 'data'=>$request->all()];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id)
    {
        try {

            $customer = Customer::find($id);
            $customer->delete();

            return ['retorno'=>'ok'];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }




}
