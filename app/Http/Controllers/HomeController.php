<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Item;

use App\Models\Cart;

use App\Models\Order;

use Session;

use Stripe;

class HomeController extends Controller
{
    
    public function index()
    {
        $item = item::all();
        
        return view('home.userpage',compact('item'));
    }

    public function menu()
    {
        $item = item::all();
        
        return view('home.menu',compact('item'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_item = item::all()->count();

            $total_order =order::all()->count();

            $total_user =user::all()->count();

            $order = order::all();

            $total_revenue = 0;

            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }


            $total_delivered =order::where('delivery_status','=','Delivered')->get()->count();

            $total_inprogress =order::where('delivery_status','=','In Progress')->get()->count();

            return view('admin.home',compact('total_item','total_order','total_user','total_revenue','total_delivered','total_inprogress'));
        }

        else
        {
            $item = item::all();
        
            return view('home.userpage',compact('item'));

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $item = item::find($id);

            $cart = new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->item_id=$item->id;
            $cart->item_title=$item->title;
            $cart->price=$item->price;
            $cart->image=$item->image;

            $cart->save();

            return redirect()->back();
        }

        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        $id = Auth::user()->id;

        $cart = cart::where('user_id','=',$id)->get();
        
        return view('home.showcart',compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);

        $cart->delete();
        
        return redirect()->back();
    }

    public function order()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order = new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->item_id=$data->id;
            $order->item_title=$data->item_title;
            $order->price=$data->price;
            $order->image=$data->image;

            $order->payment_status='Cash On Delivery';
            $order->delivery_status='In Progress';

            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);

            $cart->delete();
        }

        return redirect()->back()->with('message','We Recived Your Order. We Will Connect with You Soon');
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $userid=$user->id;

            $order = order::where('user_id', '=', $userid)->get();
            
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect ('login');
        }
    }

    public function cancel_order($id)
{
    $order = order::find($id);

    if ($order) {
        $order->delivery_status = 'Customer Canceled Order';
        $order->payment_status = 'Customer Canceled Order';
        $order->save();
        return redirect()->back()->with('message', 'Order canceled successfully.');
    } else {
        return redirect()->back()->with('error', 'Order not found.');
    }
}

public function stripe($totalprice)
{
    return view('home.stripe',compact('totalprice'));
}

public function stripePost(Request $request, $totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Recived, Thank You!!" 
        ]);

        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order = new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->item_id=$data->id;
            $order->item_title=$data->item_title;
            $order->price=$data->price;
            $order->image=$data->image;

            $order->payment_status='Paid';
            $order->delivery_status='In Progress';

            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);

            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
