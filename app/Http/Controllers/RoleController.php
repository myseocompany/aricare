<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Branch;
use App\Models\ResourceType;
use Illuminate\Http\Request;

class RoleController extends Controller {
    public function index( Request $request){
        $role_modules = RoleModules::orderBy('role_id','ASC')->get();
        $roles = Roles::all();
        $modules = Modules::all();
        return view('user_rol.index', compact('role_modules','roles', 'modules'));
    }
}