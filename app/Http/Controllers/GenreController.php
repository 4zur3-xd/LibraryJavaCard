<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class GenreController extends Controller
{
    public function create(Request $request)
    {
        try {
            Genre::create([
                'name' => $request->name,
                'short_name' => $request->short_name,
            ]);

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $data = Genre::all();

            if($data->isEmpty()){
                return ResponseHelper::red('Empty database');
            }

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $genre = Genre::find($id);

            if(!$genre){
                return ResponseHelper::red("Genre not exists");
            }

            if(!empty($request->name)){
                $genre->name = $request->name;
            }

            if(!empty($request->short_name)){
                $genre->short_name = $request->short_name;
            }

            $genre->save();

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $genre = Genre::find($id);

            if(!$genre){
                return ResponseHelper::red("Genre not exists");
            }

            $genre->delete();

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }
}
