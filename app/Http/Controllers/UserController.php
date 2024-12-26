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
                'avatar' => $request->avatar
            ]);

            return ResponseHelper::green('Successfully created!');
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $data = User::all();

            return ResponseHelper::green('Successfully!', $data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getByID($id)
    {
        try {
            $data = User::where('id', $id)->get();

            return ResponseHelper::green('Successfully!', $data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

}
