<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Item;
use App\Menu;
use App\Contact;
use App\Rating;
use App\User;
class IndexController extends Controller
{
    public function index()
    {
    	$items = Item::all();
    	$menus = Menu::all();
        $users = User::all();
        return view('index')->with('items',$items)->with('menus',$menus)->with('users',$users);
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

    public function about()
    {
        $ratings = Rating::all();
        return view('about')->with('ratings',$ratings);
    }


    public function ratingstore(Request $request)
    {
        $this->validate($request,[
        'comment' => 'required',
        'rating' => 'required'
    ]);


    $rating = new Rating();
    $rating-> user_id = Auth::id();
    $rating->rating = $request->rating;
    $rating->comment = $request->comment;
    $rating->save();

    return redirect()->back()->with('status','Rating added');
    }
}
