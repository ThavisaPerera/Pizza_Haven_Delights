<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Item;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=catagory::all();

        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory;

        $data->catagory_name=$request->catagory;

        $data->save();

        return redirect()->back()->with('message','Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = catagory::find($id);

        $data->delete();

        return redirect()->back()->with('message','Catagory Deleted Successfully');
    }


    public function view_item()
    {
        
        $catagory = catagory::all();
        return view('admin.item',compact('catagory'));
    }

    public function add_item(Request $request)
    {
        $item = new item;

        $item->title=$request->title;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->catagory=$request->catagory;
        
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('item',$imagename);
        $item->image=$imagename;


        $item->save();

        return redirect()->back()->with('message','Menu Item Added Successfully');
    }

    public function show_item()
    {
        $item = item::all();

        return view('admin.show_item',compact('item'));
    }

    public function delete_item($id)
    {
        $item = item::find($id);

        $item->delete();

        return redirect()->back()->with('message','Menu Item Deleted Successfully');
    }

    public function edit_item($id)
    {
        $item = item::find($id);

        $catagory = catagory::all();

        return view('admin.edit_item',compact('item','catagory'));
    }

    public function edit_item_confirm(Request $request, $id)
    {
        $item = item::find($id);

        $item->title=$request->title;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->catagory=$request->catagory;
        
        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('item',$imagename);
            $item->image=$imagename;  
        }
        


        $item->save();

        return redirect()->back()->with('message','Menu Item Edited Successfully');
    }

    public function view_order()
    {
        $order = Order::all();
        
        return view('admin.view_order',compact('order'));
    }

    public function delivered($id)
    {
        $order = order::find($id);

        $order->delivery_status = 'Delivered';

        $order->payment_status = 'Paid';

        $order->save();

        return redirect()->back();
    }

}
