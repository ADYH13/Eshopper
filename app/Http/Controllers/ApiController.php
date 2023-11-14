<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function getUser($id){

        if ($id) {
            $users = User::where('slug',$id)->first();

        }
        return $users;
    }

    public function getAllUsers(){
        $users = User::all();
        $nbuser = count($users);
        $retour = [$users,$nbuser];

        return $retour ;
    }

    public function addUser($nom,$prenom,$email,$numero,$password){
        $user = User::create([
            'name'=> $nom,
            'prenom' => $prenom,
            'email' => $email,
            'numero' => $numero,
            'password' => $password,
        ]);

    }
}
