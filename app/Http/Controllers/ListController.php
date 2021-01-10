<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\TableList;


class ListController extends Controller
{
    public function index(){


       
        $test = TableList::getWord();


        return view('list');
    }

    public function show(){

        return \App\TableList::orderBy('id', 'desc')->get();

    }

    public function create(Request $request){

        \App\TableList::create([
            'word' => $request->word,
            'text' => $request->text
        ]);


    }
}
