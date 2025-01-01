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
                'desc' => $request->desc,
                'img_url' => $request->img_url,
                'genre_id' => $request->genre_id,
            ]);

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $data = Books::all();

            if($data->isEmpty()){
                return ResponseHelper::red('Empty database');
            }

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getByID($id)
    {
        try {
            $data = Books::where('id', $id)->get();

            if($data->isEmpty()){
                return ResponseHelper::red('Book not exists');
            }

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $book = Books::find($id);

            if(!$book){
                return ResponseHelper::red("Book not exists");
            }

            if(!empty($request->name)){
                $book->name = $request->name;
            }

            if(!empty($request->author)){
                $book->author = $request->author;
            }

            if(!empty($request->desc)){
                $book->desc = $request->desc;
            }

            if(!empty($request->img_url)){
                $book->img_url = $request->img_url;
            }

            if(!empty($request->genre_id)){
                $book->genre_id = $request->genre_id;
            }

            $book->save();

            return ResponseHelper::green();
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function getByGenre($genre)
    {
        try {
            $data = Books::where('genre_id', $genre)->get();

            if($data->isEmpty()){
                return ResponseHelper::red('Empty');
            }

            return ResponseHelper::green($data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

}
