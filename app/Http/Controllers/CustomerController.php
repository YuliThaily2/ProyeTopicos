<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function store(Request $request){
        $customer = Customer::create([
            'first_Name' => $request->first_Name,
            'last_Name' => $request->last_Name,
            'Address' => $request->Address,
            'phone' => $request->phone,
            'email' => $request->email,
            'Password' =>$request->Password,
        ] );

        $customer->save();

        return $request;
    }

    public function show(Request $request){
        $customer = Customer::where('id', $request->id)
        ->get();
        return $customer;
    }

    public function destroy(Request $request){
        $customer =Customer::where('id',$request->id)
        ->delete();
        return 'ok';
    }

    
    public function update(Request $request){
        $customer = Customer::where('id', $request->id)->first();

        if ($customer) {
            $customer->first_Name = $request->first_Name;
            $customer->last_Name = $request-> last_Name;
            $customer->Address = $request-> Address;
            $customer->phone = $request-> phone;
            $customer->email = $request-> email;
            $customer->Password = $request-> Password;
          
            $customer->save();
            return $request;
        } else {
            return response()->json(['mensaje' => 'NO ENCONTRADO'], 404);
        }

    }
   
   
    public function login(Request $request)
    {
        // Obtener datos del formulario
        $email = $request->input('email');
        $password = $request->input('password');

        // Consultar la base de datos para verificar las credenciales
        $user = DB::table('customers')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        // Verificar si el usuario existe
        if ($user) {
            // Usuario autenticado
            return 'Login exitoso';
        } else {
            // Usuario no encontrado o credenciales incorrectas
            return 'Credenciales incorrectas';
        }
    }

    

}
