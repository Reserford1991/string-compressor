<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CompressController extends Controller
{
    public function compress(Request $request) {
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
        );
        return response()->json($response);
    }

    public function decompress(Request $request) {
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
        );
        return response()->json($response);
    }
}
