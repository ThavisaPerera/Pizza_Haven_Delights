<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="/images/cat-1-1.png" type="">
      <title>Pizza Haven Delight</title>
      @vite(["resources/js/jquery-3.4.1.min.js",
                "resources/js/popper.min.js",
                "resources/js/bootstrap.js",
                "resources/js/custom.js",
                "resources/css/bootstrap.css" ,
                "resources/css/font-awesome.min.css",
                "resources/css/style.css",
                "resources/css/responsive.css"])
      
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section starts -->
         @include('home.header')
         <!-- end header section -->
      </div>

      @section('content')

      <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                  <h3 class="mb-0">{{ Auth::user()->name }}'s Profile</h3>
                  <br>
                  @if(Auth::user()->loyaltyPoints)
                  <h4>Loyalty Points: {{ Auth::user()->loyaltyPoints->sum('points') }}</h4>
                  @else
                  <p>No loyalty points available.</p>
                  @endif
                 </div>
              </div>
           </div>
        </div>
     </section>

      <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('profile.update.name') }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                    <div class="col-md">
                                       <div class="form-group">
                                         <label for="name" style=" color: #000000; font-weight: bold;">Name:</label>
                                         <input type="text" class="form-control custom-input" name="name" value="{{ Auth::user()->name }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <button type="submit" class="custom-button">Update Name</button>
                                        </div>
                                     </div>
                                
                            </form>

                            <form action="{{ route('profile.update.email') }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                    <div class="col-md">
                                       <div class="form-group">
                                         <label for="email" style=" color: #000000; font-weight: bold;">Email:</label>
                                         <input type="text" class="form-control custom-input" name="email" value="{{ Auth::user()->email }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <button type="submit" class="custom-button">Update Email</button>
                                        </div>
                                     </div>
                                
                            </form>

                            <form action="{{ route('profile.update.phone') }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                    <div class="col-md">
                                       <div class="form-group">
                                         <label for="phone" style=" color: #000000; font-weight: bold;">Phone:</label>
                                         <input type="tel" class="form-control custom-input" name="phone" value="{{ Auth::user()->phone }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <button type="submit" class="custom-button">Update Phone</button>
                                        </div>
                                     </div>
                                
                            </form>

                            <form action="{{ route('profile.update.address') }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                    <div class="col-md">
                                       <div class="form-group">
                                         <label for="address" style=" color: #000000; font-weight: bold;">Address:</label>
                                         <input type="text" class="form-control custom-input" name="address" value="{{ Auth::user()->address }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <button type="submit" class="custom-button">Update Address</button>
                                        </div>
                                     </div>
                                
                            </form>

                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="old_password" style=" color: #000000; font-weight: bold;">Old Password:</label>
                                         <input type="password" class="form-control custom-input" name="old_password">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="password" style=" color: #000000; font-weight: bold;">New Password:</label>
                                          <input type="password" class="form-control custom-input" name="password">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="custom-button">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

   </body>
</html>

<style>

.card-body {
  background-color: #fff;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.custom-input {
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.custom-input:focus {
    border-color: #ff6f00;
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 111, 0, 0.5);
}

.custom-button {
    padding: 10px 20px;
    background-color: #ff6f00;
    border: none;
    font-weight: bold;
    font-size: 12px;
    text-transform: uppercase;
    color: white;
    letter-spacing: 1px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.custom-button:hover {
    background-color: #ffcc80;
}

.custom-button:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 111, 0, 0.5);
}

.custom-button:active {
    background-color: #ff4500;
}

</style>
