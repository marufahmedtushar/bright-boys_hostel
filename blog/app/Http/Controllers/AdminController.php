<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rooms;
use App\User;
class AdminController extends Controller
{
     public function dashboard()
    {
    	return view('admin.dashboard');
    }

    public function rooms()
    {
    	$rooms = Rooms::all();
    	return view('admin.rooms')->with('rooms',$rooms);
    }

    public function roomstore(Request $request){

        $this->validate($request,[
            'room_number' => 'required'
      
            

        ]);



        $room = new Rooms();
        $room-> user_id = Auth::id();
        $room->room_number = $request->input('room_number');
        
        $room->save();

        return redirect('/rooms');
    }

    public function roomdelete(Request $request)
    {

        $rooms = Rooms::findOrFail($request->room_id);
        $rooms->delete();

        // toastr()->success('Room Deleted Successfully');
        return redirect('/rooms');

    }


     public function users(){
           $users = User::all();
        return view('admin.users')->with('users',$users);
    }


    public function userroleedit(Request $request,$id){
        $users = User::findOrFail($id);
        return view('admin.edit')->with('users',$users);

    }


    public function userroleupdate(Request $request,$id){
        $users = User::find($id);
        $users->user_type = $request->input('usertype');
        $users->update();

        return redirect('/users')->with('status','User role is updated');
    }

   


    


}
