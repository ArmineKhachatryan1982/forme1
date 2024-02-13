<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignRoleController extends Controller
{
    public function asign($type,$id){
     
        $user=User::where('id',$id)->first();
        $role=Role::where('name',$type)->first();
        // dd($role);
        $user->assignRole([$role->id]);
        return redirect()->back()->with('role_name', $type);


    }
}
