<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class OrderController extends Controller
{
    public function FormOrder($id)
    {
        $data = ProdukModel::where('id', $id)
            ->with(['getTravelFromProduk','getBimbelFromProduk','getJasaFotoFromProduk'])->first();
            // dd($data);
        return view('user.order.index', compact('data'));
    }
}
