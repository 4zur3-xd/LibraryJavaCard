<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\Books;

class BookController extends Controller
{

    public function create(Request $request)
    {
        try {
            Books::create([
                'name' => $request->name,
                'author' => $request->author,
                'desc' => $request->desc
            ]);

            return ResponseHelper::green('Successfully created!');
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $data = Books::all();

            return ResponseHelper::green('Successfully!', $data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getByID($id)
    {
        try {
            $data = Books::where('id', $id)->get();

            return ResponseHelper::green('Successfully!', $data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

}
