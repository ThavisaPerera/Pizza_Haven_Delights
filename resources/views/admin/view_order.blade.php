<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">

        .item_table{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: solid #ffffff;
        }

        .item_table tr {
            border-bottom: 1px solid #ffffff;
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
            padding-top: 40px;
        }

        .table_space{
            padding: 20px;
        }

        .head_color{
            background-color: rgb(63, 220, 42);
        }

        
    </style>

  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      
      @include('admin.header')


      <div class="main-panel">
        <div class="content-wrapper">
            <div class="div_center">

                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">x</button>

                    {{session()->get('message')}}

                </div>

                @endif

                <h2 class="h2_font">
                    Orders
                </h2>

                <table class="item_table">

                    <tr class="head_color">
                        <th class="table_space">Name</th>
                        <th class="table_space">Email</th>
                        <th class="table_space">Address</th>
                        <th class="table_space">Mobile Number</th>
                        <th class="table_space">Menu Item</th>
                        <th class="table_space">Price</th>
                        <th class="table_space">Payment Status</th>
                        <th class="table_space">Delivery Status</th>
                        <th class="table_space">Delivered</th>
                    </tr>
    
    
                    @foreach($order as $order)
    
                        <tr>
                            <td class="table_space">{{$order->name}}</td>
                            <td class="table_space">{{$order->email}}</td>
                            <td class="table_space">{{$order->address}}</td>
                            <td class="table_space">{{$order->phone}}</td>
                            <td class="table_space">{{$order->item_title}}</td>
                            <td class="table_space">${{$order->price}}</td>
                            <td class="table_space">{{$order->payment_status}}</td>
                            <td class="table_space">{{$order->delivery_status}}</td>
    
                            <td>
                                @if($order->delivery_status=='In Progress')
                                
                                <a class="btn btn-primary" href="{{url('delivered',$order->id)}}">Delivered</a>

                                @else

                                <p style="color: rgb(0, 185, 19); font-weight:bold;">Delivered</p>

                                @endif

                            </td>
                        </tr>
    
                    @endforeach
    
    
                </table>
        </div>
      </div>


      @include('admin.script') 
  </body>
</html>