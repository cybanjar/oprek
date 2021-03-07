<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PostingController extends Controller
{
    public function index(Request $request) {
        $posting = Posting::paginate(5);
        if($request->ajax()) {
            $view = view('data', compact('posting'))->render();
            return response()->json(['html' => $view]);
        }

        return view('posting', compact('posting'));
    }
}
