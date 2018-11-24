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
            $response = $this->returnResponse('error', __FILE__. ' ' . __LINE__. ': ' . $e->getMessage());
            return response()->json($response);
        }

    }

    public function decompress(Request $request) {
        try {
            $this->validateRequest($request, '/^[a-f0-9]+$/u');

            //Decompress string algorithm
            $compressed = $request->message;
            $deComressed = '';
            $pattern = '/[a-f][0-9]+/i';
            $deComressed = preg_replace_callback(
                $pattern,
                function ($matches) {
                    foreach ($matches as $match) {
                        $firstLetter = substr($match, 0, 1);
                        $number = (int)str_replace($firstLetter, '', $match);
                        $newStr = '';
                        for($i=0; $i < $number; $i++) {
                            $newStr .= $firstLetter;
                        }
                        return $newStr;
                    }
                },
                $compressed);

            $response = $this->returnResponse('success', $deComressed);
            return response()->json($response);
        } catch (Exception $e) {
            $response = $this->returnResponse('error', __FILE__. ' ' . __LINE__. ': ' . $e->getMessage());
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
