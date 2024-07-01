<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\user;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class BoardController extends Controller
{



    // GET /api/boards
    public function index(Request $request)
    {
        $boards = Board::where('user_id', $request->user_id)->get();
        return view('boards')->with(compact('boards'));
    }

    // POST /api/boards
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'user_id' => 'required|integer', // Validate as integer
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    $board = Board::create([
        'name' => $request->name,
        'user_id' => $request->user_id, // Ensure it matches the column name
    ]);

    return response()->json(['message' => 'Board created successfully!'], 201); // 201 status for creation
}

    



    public function addBoard(){

       $user= user::first();
       return view('add_board')->with(compact('user'));

    }

    // GET /api/boards/{board}
    public function show(Board $board)
    {
        
        return $board;
    }

    // PUT /api/boards/{board}
    public function update(Request $request, Board $board)
    {
        $board->update($request->all());
        return response()->json($board, 200);
    }

    // DELETE /api/boards/{board}
    public function destroy(Board $board)
    {
        $board->delete();
        return response()->json(null, 204);
    }
}
