<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issue;

class AdminIssueController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('issue.AdminCreateIssue');
    }

     public function store(Request $request)
    {


        issue::create([
            'userid'  =>$request->input('userid'),
            'img' =>$request->input('img'),
            'title' =>$request->input('title'),
            'artist' =>$request->input('artist'),
            'href' =>$request->input('href'),
            'contents' =>$request->input('contents'),
        ]);

        return redirect('/admin');
    }


    public function show($id)
    {
        //
    }

    public function edit(issue $id)
    {
        return view('issue.AdminIssueEdit', [
            'id' => $id
        ]);
    }

    public function update(issue $id)
    {
        $id->update([
            'userid' => request('userid'),
            'img' => request('img'),
            'title' => request('title'),
            'artist' => request('artist'),
            'href' => request('href'),
            'contents' => request('contents')
        ]);
        return redirect('admin');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($i)
    {
        issue::where('id', $i)->delete();
    }
}
