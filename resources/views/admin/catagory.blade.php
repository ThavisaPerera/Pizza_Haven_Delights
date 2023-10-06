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
            width: 40%;
            padding: 10px;
            border: 1px solid #ffffff;
            border-radius: 
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
            background-color: rgb(164, 164, 164)
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

        .catagory_table{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: solid #ffffff;
        }

        .catagory_table tr {
            border-bottom: 1px solid #ffffff;
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
                    Add Menu Catagory
                </h2>

                <form action="{{url('/add_catagory')}}" method="POST">

                    @csrf

                    <input type="text" class="input_color" name="catagory" placeholder="Enter Catagory Name">
                    <br><br>

                    <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                </form>
            </div>

            <table class="catagory_table">
                <tr>
                    <th>Catagory Name</th>
                    <th>Action</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->catagory_name}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                    </td>
                </tr>

                @endforeach
                
            </table>
        </div>
      </div>


      @include('admin.script') 
  </body>
</html>