<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use log;
use App\Models\ListItem;


class TodoListController extends Controller
{
    public function saveItem(Request $request){

        $newListItem = new ListItem;
        $newListItem->name=$request->listItem;
        $newListItem->save();

        return view('index');
    }
}
