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
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Menu Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- footer section -->
      @include('home.footer')
      <!-- footer section -->

      
      <script src="home/js/jquery-3.4.1.min.js"></script>

      <script src="home/js/popper.min.js"></script>
   
      <script src="home/js/bootstrap.js"></script>

      <script src="home/js/custom.js"></script>
   </body>
</html>