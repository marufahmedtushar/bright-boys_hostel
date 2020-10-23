<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Rooms;
use App\User;
use App\Information;
use App\Bill;
use App\Categories;
use App\Item;
use App\Menu;
class AdminController extends Controller
{
     public function dashboard()
    {

        
        $totalrooms = Rooms::count();
        $totalusers = User::count();
        $totalstudents = Information::count();
        $totalcategories = Categories::count();
        $totalmenus= Item::count();


        return view('admin.dashboard',[
            'totalrooms'=>$totalrooms,
            'totalusers'=>$totalusers,
            'totalstudents'=>$totalstudents,
            'totalcategories'=>$totalcategories,
            'totalmenus'=>$totalmenus,
        ]);

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



    public function viewbill($id){
    
         $bill = Bill::findOrFail($id);
        return view('admin.viewbill')->with('bill',$bill);

    }


    public function bills()
    {
        $bills = Bill::all();
        return view('admin.bill')->with('bills',$bills);
    }

    public function editbill($id){
        $bills = Bill::findOrFail($id);
        return view('admin.editbill')->with('bills',$bills);

    }

    public function updatebill(Request $request,$id){


        $this->validate($request,[
            'paymentstatus' => 'required',
        ]);



        $bills = Bill::find($id);
        $bills->paymentstatus = $request->input('paymentstatus');
        $bills->update();

        return redirect('/bills');
    }


    public function categories()
    {
        $categories = Categories::all();
        return view('admin.categories')->with('categories',$categories);
    }


    public function categorystore(Request $request){

        $this->validate($request,[
            'name' => 'required'
      
            

        ]);



        $categories = new Categories();
        $categories->name = $request->input('name');
        $categories->save();

        return redirect('/categories');
    }


    public function item()
    {
        $items = Item::all();
        $categories = Categories::all();
        $menus = Menu::all();
        return view('admin.meals')->with('items',$items)->with('categories',$categories)->with('menus',$menus);
    }

    public function itemstore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'categories_id' => 'required'
            
      
            

        ]);


        //file upload
        if($request->hasFile('cover_image')){
            //get file name  with the  extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to  store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        }else{
            $fileNameToStore = 'noimage.jpg';
        }



        $item = new Item;
        $item->name = $request->input('name');
        $item->desc = $request->input('desc');
        $item->price = $request->input('price');
        $item->cover_image = $fileNameToStore;
        $item->categories_id = $request->input('categories_id');
        $item->save();
        return redirect('/item');
    }

    public function itemdelete(Request $request)
    {

        $items = Item::findOrFail($request->item_id);
        if($items->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$items->cover_image);
        }
        $items->delete();

        // toastr()->success('Room Deleted Successfully');
        return redirect('/item');

    }


    public function menustore(Request $request){

        $this->validate($request,[
            'day' => 'required',
            'breakfast_menu' => 'required',
            'lunch_menu' => 'required',
            'dinner_menu' => 'required'

        ]);



        $menu = new Menu;
        $menu->day = $request->input('day');
        $menu->breakfast_menu = implode(",", $request->breakfast_menu);
        $menu->lunch_menu = implode(",", $request->lunch_menu);
        $menu->dinner_menu = implode(",", $request->dinner_menu);
        $menu->save();
        return redirect('/item');

    }


    public function edititem($id){
        $items = Item::findOrFail($id);
        $categories = Categories::all();
        return view('admin.edititem')->with('items',$items)->with('categories',$categories);

    }


    public function updateitem(Request $request,Item $item){


        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'categories_id' => 'required',

        ]);


        //file upload
        if($request->hasFile('cover_image')){
            //get file name  with the  extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to  store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        }



      
        $item->name = $request->input('name');
        $item->desc = $request->input('desc');
        $item->price = $request->input('price');
        $item->categories_id = $request->input('categories_id');

        if($request->hasFile('cover_image')){
            $item->cover_image = $fileNameToStore;
        }
        $item->save();
        return redirect('/item');
    }


   public function menudelete(Request $request)
    {

        $menus = Menu::findOrFail($request->menu_id);
        $menus->delete();

        // toastr()->success('Room Deleted Successfully');
        return redirect('/item');

    }



    


}
