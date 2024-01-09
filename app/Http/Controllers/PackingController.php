<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use Illuminate\Http\Request;

class PackingController extends Controller
{
    public function index()
    {
        $packing = Packing::all();
        return response()->json($packing, 200);
    }
}
