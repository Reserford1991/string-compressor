<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

class CompressController extends Controller
{
    public function compress(Request $request) {

        try {
            $this->validateRequest($request, '/^[a-f]+$/u');



            $response = $this->returnResponse('success', $request->message);

            return response()->json($response);
        } catch (Exception $e) {
            $response = $this->returnResponse('error', 'Backend Validation went wrong!');
            return response()->json($response);
        }

    }

    public function decompress(Request $request) {
        try {
            $this->validateRequest($request, '/^[a-f1-9]+$/u');
            $response = $this->returnResponse('success', $request->message);
            return response()->json($response);
        } catch (Exception $e) {
            $response = $this->returnResponse('error', 'Backend Validation went wrong!');
            return response()->json($response);
        }
    }

    public function validateRequest(Request $str, String $patt) {
        $regex = 'regex:'. $patt .'';
        return (
        $str->validate([
            'message' => array(
                $regex
            )
        ])
        );
    }

    public function returnResponse(String $status, String $mess) {
        return [
            'status' => $status,
            'msg' => $mess,
        ];
    }
}
