<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/cat-1-1.png" type="">
      <title>Pizza Haven Delight</title>
     
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />

      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      
      <link href="home/css/style.css" rel="stylesheet" />

      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .center {
            display: flex;
            justify-content: center;
        }

        table{
            border: 2px solid rgb(0, 0, 0);
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        tr{
            border: 2px solid rgb(0, 0, 0);
        }

        th{
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        td{
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        .th_deg{
            font-size: 20px;
            color: rgb(255, 255, 255);
            background-color: rgb(255, 128, 0);
        }

        .img_size{
            max-width: 250px;
            max-height: 250px;
        }

        .btn-order{
            color: rgb(255, 255, 255);
            background-color: rgb(0, 0, 0);
            font-size: 20px;
            font-weight: bold;
        }

    </style>

   </head>

   <body class="sub_page">
    <div class="hero_area">
       <!-- header section strats -->
       @include('home.header')
       <!-- end header section -->
    </div>
      
      <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Order History</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>

     @if(session()->has('message'))

     <div class="alert alert-success">

         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">x</button>

         {{session()->get('message')}}

     </div>

     @endif

    <div class="center">

        <table>
            <tr>
                <th class="th_deg">Image</th>
                <th class="th_deg">Item Title</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Action</th>
            </tr>
            
            @foreach($order as $order)
            
            <tr>
                <td><img class="img_size" src="/item/{{$order->image}}"></td>
                <td>{{$order->item_title}}</td>
                <td>${{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    @if($order->delivery_status=='In Progress')
                    <a class="btn btn-danger" href="{{ url('cancel_order',$order->id)}}">Cancel Order</a>
                    @else
                    <p>Order Collected<p>
                    @endif
                </td>
            </tr>
            

            @endforeach

        </table>
    </div>





      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      
      

      <script src="home/js/jquery-3.4.1.min.js"></script>
    
      <script src="home/js/popper.min.js"></script>

      <script src="home/js/bootstrap.js"></script>

      <script src="home/js/custom.js"></script>
   </body>
</html>