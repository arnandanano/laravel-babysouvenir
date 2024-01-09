<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRole()
    {
        $dataRole = Role::with('relationToUser')->get();

        return $dataRole;

        // $datarole = Role::all();
        // return view('role', ['dataRole' => $datarole]);
    }
}
