<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\TableList;


class ExampleTest extends TestCase
{

    use WithoutMiddleware;
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       
        $response = TableList::getWord();
        $this->assertEquals('verifying',$response['word']);
    
    }
    public function testsecondTest(){
       
    
        $this->get('/')
        ->Click('登録')
        ->assertSee('登録');

       
    }

}
