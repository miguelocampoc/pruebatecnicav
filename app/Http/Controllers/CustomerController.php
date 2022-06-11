<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function EditarCustomer( Request $request, $id )
    {
        $customer = DB::table('customer')->findOrFail($id);

        $customer->contactName=  $request->contactName;
        $customer->save();
     }
}
