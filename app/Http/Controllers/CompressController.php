<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

class CompressController extends Controller
{
    public function compress(Request $request) {

        try {
            $this->validateRequest($request, '/^[a-f]+$/u');


            // String compression algorithm
            $deComressed = $request->message;
            $compressed = '';
            $compressedArr = str_split($deComressed);
            $i = 0;
            $j = 0;
            $tempArr = [];
            $substringsArr[0] = $compressedArr[0];
            foreach($compressedArr as $letter) {
                if($i > 0) {
                    if($compressedArr[$i-1] == $compressedArr[$i]) {
                        $substringsArr[$j] .= $letter;
                    } else {
                        $j++;
                        $substringsArr[$j] = $letter;
                    }
                }
                $i++;
            }
            foreach ($substringsArr as $substring) {
                $length = strlen($substring);
                if ($length < 3) {
                    $compressed .= $substring;
                }
                if ($length >= 3){
                    $firstLetter = substr($substring, 0, 1);
                    $compressed .= $firstLetter . $length;
                }
            }

            $response = $this->returnResponse('success', $compressed);
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
