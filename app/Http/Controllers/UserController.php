<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers(Request $r)
    {
        $id = $r->id;
        $email = $r->email;
        $password = $r->password;
        $type = $r->type;

        try {
            $usr = User::all();
            if ($id != null) {
                $usr = $usr->where("id", $id);
            }
            if ($email != null) {
                $usr = $usr->where("email", $email);
            }
            if ($type != null) {
                $usr = $usr->where("type", $type);
            }
            if ($password != null) {
                $arr = [];
                foreach ($usr as $k => $v) {
                    if (Hash::check($password, $v->password)) {
                        array_push($arr, $v);
                    }
                }
                $usr = $arr;
            } else {
                $usr = $usr->values();
            }
            return makeJson("Success get user", $usr);
        } catch (\Throwable $th) {
            return makeJson($th->getMessage(), null);
        }
    }

    public function searchUser(Request $r)
    {
        $name = $r->name;
        $email = $r->email;
        $type = $r->type;
        try {
            $usr = User::where("name", "like", "%" . $name . "%")->where("email", "like", "%" . $email . "%")->where("type", "=", $type)->get();
            $usr = $usr->values();
            return makeJson("Success get user", $usr);
        } catch (\Throwable $th) {
            return makeJson($th->getMessage(), null);
        }
    }

    public function register(Request $r)
    {
        $usr_exist = User::where("email", $r->email)->get();
        if (count($usr_exist) > 0) {
            return makeJson("Error, email already used!", null);
        }

        try {
            $user = new User;
            $user->name = $r->name;
            $user->email = $r->email;
            $user->description = $r->description;
            $user->type = $r->type;
            $user->password = Hash::make($r->password);

            $user->notelp = $r->notelp;

            $user->save();

            return makeJson("Register Success", [$user]);
        } catch (\Throwable $th) {
            return makeJson($th->getMessage(), null);
        }
    }
}
