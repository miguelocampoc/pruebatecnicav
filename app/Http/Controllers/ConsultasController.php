<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function index( Request $request )
     {
      return DB::table('product')
       ->join('category', 'product.categoryId', '=', 'product.productId')
       ->join('shipper','shipper.shipperId','=','product.productId')
       ->get();
    }
    public function consulta2( Request $request )
     {
      return DB::table('salesOrder')
       ->join('customer', 'customer.custId', '=', 'salesOrder.custId')
       ->get();
    }
    
}
