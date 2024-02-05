<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Item;

use App\Models\User;

use App\Models\LoyaltyPoints;

use Illuminate\Support\Facades\Auth;

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

        $totalPrice = Item::sum('price');

        return view('admin.item', [
            'totalprice' => $totalPrice,
            'message' => 'Menu Item Added Successfully',
        ]);
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

        $loyaltyPoints = $this->calculateLoyaltyPoints($order->user_id, $order->price);
        
        LoyaltyPoints::create([
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            'points' => $loyaltyPoints,
        ]);

        return redirect()->back()->with('loyaltyPoints', $loyaltyPoints);

    }

    private function calculateLoyaltyPoints($userId, $orderAmount)
    {
        
        $basePointsPerDollar = 0.1;
        $loyaltyPointsEarned = floor($orderAmount * $basePointsPerDollar);

        
        $bonusThreshold1 = 25; 
        $bonusPoints1 = 5;
        $bonusThreshold2 = 50;
        $bonusPoints2 = 10;

        if ($orderAmount >= $bonusThreshold2) {
            $loyaltyPointsEarned += $bonusPoints2;
        } elseif ($orderAmount >= $bonusThreshold1) {
            $loyaltyPointsEarned += $bonusPoints1;
        }

        return $loyaltyPointsEarned;
    }



    public function user_management()
    {
        $users = user::all();

        return view('admin.user_management',compact('users'));
    }

    public function del_user($id)
    {
        $user = user::find($id);

        $user->delete();

        return redirect()->back()->with('message','User Deleted Successfully');
    }


    public function applyDiscount(Request $request)
{
    // Retrieve the authenticated user
    $user = Auth::user();

    // Retrieve cart items associated with the user using the relationship
    $cart = $user->cartItems;

    // Check if cart is not empty
    if ($cart->isNotEmpty()) {
        // Calculate total price based on cart items
        $totalPrice = $cart->sum('price');
    } else {
        $totalPrice = 0; // Set a default value if the cart is empty
    }

    // Get the loyalty points submitted in the form
    $loyaltyPointsToApply = $request->input('loyalty_points');

    // Ensure the loyalty points to apply is not greater than the user's total loyalty points
    $loyaltyPointsToApply = min($loyaltyPointsToApply, $user->loyaltyPoints->sum('points'));

    // Update the discounted price
    $discountedPrice = $totalPrice - $loyaltyPointsToApply;

    return redirect()->back()->with([
        'message' => 'Discount applied successfully.',
        'totalprice' => $discountedPrice,
    ]);
}



    
}
