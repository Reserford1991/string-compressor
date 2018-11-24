<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompressorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCompress()
    {
        $response = $this->call('POST', '/compress', array(
            '_token' => csrf_token(),
            'message' => 'aaa'
        ));

        $response->assertStatus(200);
        $response->assertJson([
                'status' => 'success',
                'msg' => 'a3'
            ]
        );
    }

    public function testDecompress()
    {
        $response = $this->call('POST', '/decompress', array(
            '_token' => csrf_token(),
            'message' => 'a3'
        ));

        $response->assertStatus(200);
        $response->assertJson([
                'status' => 'success',
                'msg' => 'aaa'
            ]
        );
    }
}
