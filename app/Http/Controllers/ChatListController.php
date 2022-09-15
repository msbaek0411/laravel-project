<?php

namespace App\Http\Controllers;


use App\ChatList;

// json data
use Illuminate\Http\Request;


class ChatListController extends Controller
{
    public function index() {
        // $ChatList = ChatList::all();

        $ChatList = ChatList::where(function($query) {
            $query->where('userid', request('userid'));
        })->latest()->get();

        return response()->json([
            'ChatList' => $ChatList
        ],200);
    }

    public function store() {
        $validated = request()->validate([
            'userid' => 'required',
            'index' => 'required',
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

        return response()->json([
            'ChatList' => $ChatList
        ], 201);

    }

    public function destory($i)
    {
        // data 생성 
        // $ChatList = ChatList::find($i);
        // $ChatList->delete();
        ChatList::where('index', $i)->delete();
              
        
    }

    public function alldata()
    {
        $ChatList = ChatList::all();

        return response()->json([
            'ChatList' => $ChatList
        ],200);
    }
      


}
