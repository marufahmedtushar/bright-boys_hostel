<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rooms;
use App\User;
use App\Information;
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

        return redirect('/users');
    }

    public function students(){
           $infos = Information::all();
           $rooms = Rooms::all();
           $users = User::all();
        return view('admin.students')->with('infos',$infos)->with('rooms',$rooms)->with('users',$users);
    }


    public function userdelete(Request $request)
    {

        $users = User::findOrFail($request->user_id);
        $users->delete();

        // toastr()->success('Room Deleted Successfully');
        return redirect('/users');

    }

    public function infostore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'university' => 'required',
            'department' => 'required',
            'address' => 'required',
            'room_id' => 'required',
            'room_number' => 'required'
      
            

        ]);



        $infos = new Information();
        $infos->name = $request->input('name');
        $infos->email = $request->input('email');
        $infos->university = $request->input('university');
        $infos->department = $request->input('department');
        $infos->addresss = $request->input('address');
        $infos->room_id = $request->input('room_id');
        $infos->room_number = $request->input('room_number');
        
        $infos->save();

        return redirect('/students');
    }


     public function editinfo(Request $request,$id){
        $infos = Information::findOrFail($id);
        return view('admin.editinfo')->with('infos',$infos);

    }

    public function upinfo(Request $request,$id){
        $users = Info::find($id);
        $users->user_type = $request->input('usertype');
        $users->update();

        return redirect('/students');
    }

   


    


}
