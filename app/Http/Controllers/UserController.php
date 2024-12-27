<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class UserController extends Controller
{

    public function create(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'pin' => $request->pin,
                'address' => $request->address,
                'avatar' => $request->avatar,
                'role' => $request->role,
            ]);

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $data = User::all();

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getByID($id)
    {
        try {
            $data = User::where('id', $id)->get();

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $user = User::find($id);

            if(!$user){
                return ResponseHelper::red("User not exists");
            }

            if(!empty($request->name)){
                $user->name = $request->name;
            }

            if(!empty($request->pin)){
                $user->pin = $request->pin;
            }

            if(!empty($request->address)){
                $user->address = $request->address;
            }

            if(!empty($request->avatar)){
                $user->avatar = $request->avatar;
            }

            if(!empty($request->role)){
                $user->role = $request->role;
            }

            if(!empty($request->status)){
                $user->status = $request->status;
            }

            $user->save();

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

}
