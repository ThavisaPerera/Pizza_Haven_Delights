<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
    
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color
        {
            color: black;
            padding-bottom: 20px;
            border: 1px solid #ffffff;
            border-radius: 
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .label{
            display: inline-block;
            width: 200px;
        }

        .btn-primary {
            background-color: #000000;
            color: #fff;
            padding: 10px 20px;
            border: solid #4fd706;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #4fd706;
            border: solid #4fd706;
        }

        .div_design{
            padding-bottom: 15px; 
        }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      
      @include('admin.header')


      <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">x</button>

                    {{session()->get('message')}}

                </div>

            @endif

            <div class="div_center">

                <h2 class="h2_font">
                    Add Menu Item
                </h2>

                <form action="{{url('/add_item')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label class="label">Name:</label>
                        <input type="text" class="input_color" name="title" placeholder="Enter Name" required="">
                    </div>

                    <div class="div_design">
                        <label class="label">Description:</label>
                        <input type="text" class="input_color" name="description" placeholder="Enter Description" required="">
                    </div>

                    <div class="div_design">
                        <label class="label">Price:</label>
                        <input type="number" class="input_color" name="price" placeholder="Enter Price" required="">
                    </div>

                    <div class="div_design">
                        <label class="label">Menu Catagory:</label>
                        <select class="input_color" name="catagory" required="">
                            <option value="" selected="">Add a catagory here</option>
                            
                            @foreach($catagory as $catagory)
                            
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="div_design">
                        <label class="label">Image:</label>
                        <input type="file" name="image" required="">
                    </div>

                    <div class="div_design">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Menu Item">
                    </div>

                </form>

            </div>

        </div>
      </div>


      @include('admin.script') 
  </body>
</html>