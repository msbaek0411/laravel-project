<?php

namespace App\Http\Controllers;
use App\TestZ;
use Illuminate\Http\Request;

class TestZController extends Controller
{
  public function index()
  {
    $TestZ = TestZ::all();

    return response()->json([
        'testz' => $TestZ
    ],200);
  }
}
