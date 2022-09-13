<?php

namespace App\Http\Controllers;

use App\ChatList;
use Illuminate\Http\Request;

class ChatListController extends Controller
{
    public function index() {
        $ChatList = ChatList::all();

        return response()->json([
            'ChatList' => $ChatList
        ],200);
    }

    public function store(Request $request) {
        $validated = request()->validate([
            'title' => 'required',
            'img' =>  'required',
            'img2' =>  'required',
            'albumName'=>  'required',
            'artist'=>  'required',
            'playlist'=>  'required',
            'createDate'=> 'required',
            // 'update'=>'required',
        ]);

        $ChatList = ChatList::create($validated);

    }



}
