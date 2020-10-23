<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Item;
use App\Menu;
class IndexController extends Controller
{
    public function index()
    {
    	$items = Item::all();
    	$menus = Menu::all();
        return view('index')->with('items',$items)->with('menus',$menus);
    }
}
