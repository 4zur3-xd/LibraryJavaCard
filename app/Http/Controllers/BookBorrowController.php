<?php

namespace App\Http\Controllers;

use App\Models\BookBorrows;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class BookBorrowController extends Controller
{
    public function borrow(Request $request)
    {
        try {
            BookBorrows::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'duration' => $request->duration,
                'created_at' => now(),
            ]);

            return ResponseHelper::green('Successfully borrowed!');
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }

    public function borrowHistory($id)
    {
        try {
            $data = BookBorrows::where('user_id', $id)->get();

            return ResponseHelper::green('Successfully get!', $data);
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }
}
