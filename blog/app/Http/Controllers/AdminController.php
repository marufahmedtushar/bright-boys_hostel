<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rooms;
use App\User;
use App\Information;
use App\Bill;
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
           $bills = Bill::all();
        return view('admin.students')->with('infos',$infos)->with('rooms',$rooms)->with('users',$users)->with('bills',$bills);
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
         $rooms = Rooms::all();
        return view('admin.editinfo')->with('infos',$infos)->with('rooms',$rooms);

    }

    public function updateinfo(Request $request,$id){
        $infos = Information::find($id);
        $infos->name = $request->input('name');
        $infos->university = $request->input('university');
        $infos->department = $request->input('department');
        $infos->addresss = $request->input('address');
        $infos->room_id = $request->input('room_id');
        $infos->room_number = $request->input('room_number');
        $infos->update();

        return redirect('/students');
    }


    public function billstore(Request $request){

        $this->validate($request,[
            'date' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'room_number' => 'required',
            'payment_status' => 'required',
            'months' => 'required',
            'hostelbill' => 'required',
            'mealbill' => 'required',
            'internetbill' => 'required',
            'otherdue' => 'required',
            'totalbill' => 'required'
      
            

        ]);



        $bills = new Bill();
        $bills-> user_id = Auth::id();
        $bills->date = $request->input('date');
        $bills->name = $request->input('name');
        $bills->email = $request->input('email');
        $bills->mobile = $request->input('mobile');
        $bills->room_number = $request->input('room_number');
        $bills->paymentstatus = $request->input('payment_status');
        $bills->months = implode(",", $request->months);
        $bills->hostelbill = $request->input('hostelbill');
        $bills->mealbill = $request->input('mealbill');
        $bills->internetbill = $request->input('internetbill');
        $bills->otherdue = $request->input('otherdue');
        $bills->totalbill = $request->input('totalbill');
        
        $bills->save();

        return redirect('/students');
    }



    public function viewbill(Request $request,$id){
        $information = Information::findOrFail($id);
         $bills = Bill::all();
        return view('admin.viewbill')->with('information',$information)->with('bills',$bills);

    }

   


    


}
