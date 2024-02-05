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

        .img_size{
            max-width: 250px;
            max-height: 250px;
        }

        .table_space{
            padding: 30px;
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

            @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">x</button>

                    {{session()->get('message')}}

                </div>

            @endif

            <h2 class="h2_font">
                Users
            </h2>

            <table class="item_table">

                <tr class="head_color">
                    <th class="table_space">User Name</th>
                    <th class="table_space">Email</th>
                    <th class="table_space">phone</th>
                    <th class="table_space">Address</th>
                    <th class="table_space">Delete</th>
                </tr>


                @foreach($users as $users)

                    <tr>
                        <td class="table_space">{{$users->name}}</td>
                        <td class="table_space">{{$users->email}}</td>
                        <td class="table_space">{{$users->phone}}</td>
                        <td class="table_space">{{$users->address}}</td>

                        <td>
                            <a class="btn btn-danger" href="{{url('del_user',$users->id)}}">Delete</a>
                        </td>
                    </tr>

                @endforeach


            </table>

        </div>
      </div>


      @include('admin.script') 
  </body>
</html>