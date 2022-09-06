<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListFile;

class ListFileController extends Controller
{
    public function index()
    {
        $ListFile = ListFile::all();
        return response()->json([
            'ListFile'=> $ListFile
        ],200);
    }
}
