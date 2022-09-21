<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatList;
use App\User;
use App\issue;


class AdminController extends Controller
{
    public function create()
    {
        return view('AdminCreate');
    }
    
    public function store(Request $request)
    {


        User::create([
            'name'  =>$request->input('name'),
            'email' =>$request->input('email'),
            'password' =>$request->input('password'),
        ]);

        return redirect('/admin');
    }

    public function show(User $id)
    {
        return view('AdminPageDetail',[
            'id' => $id
        ]);
    }

    public function edit(User $id)
    {
        return view('AdminPageEdit', [
            'id' => $id
        ]);
    }

    public function update(User $id)
    {
        $id->update([
            'name' => request('name'),
            'email' => request('email')
        ]);
        return redirect('admin');
    }

    public function destory($i)
    {
        // data 생성 
        // $ChatList = ChatList::find($i);
        // $ChatList->delete();
        User::where('id', $i)->delete();
              
        
    }
}
