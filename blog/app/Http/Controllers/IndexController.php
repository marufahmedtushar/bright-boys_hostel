<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Item;
use App\Menu;
use App\Contact;
class IndexController extends Controller
{
    public function index()
    {
    	$items = Item::all();
    	$menus = Menu::all();
        return view('index')->with('items',$items)->with('menus',$menus);
    }

    public function contact()
    {
    	return view('contact');
    }

    public function contactstore(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'msg' => 'required'
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->msg = $request->input('msg');
        $contact->save();
    	return redirect('/contact')->with('status','We will contact with you soon..');
    }
}
