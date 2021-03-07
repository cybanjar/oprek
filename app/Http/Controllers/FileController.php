<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\File;

class FileController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'filenames' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Gagal',
            ], 401);
        }

        $data = $request->all();
        $data['filenames'] = $request->file('filenames')->store('assets/posting', 'public');
        $file = File::create($data);

        // return ResponseFormatter::success([$data], 'File Successfully uploaded!');
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully',
            'data'      => $file
        ]);


        // $file->storeAs('images', $imageName); store/app/files/file.png
        // $file->move(public_path('images', $imageName)); public/files/file.png
    }
}
