<?php

namespace App\Http\Controllers;

use App\Models\Proses;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function index(){
        $proses = Proses::all();
        return response()->json($proses, 200);
    }
}
