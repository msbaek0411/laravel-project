<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issue;

class IssueController extends Controller
{
    public function index() {
        $issue = issue::all();

        return response()->json([
            'issue' => $issue
        ],200);
    }

}
