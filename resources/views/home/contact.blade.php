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
                  <h3>Contact us</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end inner page section -->
   <!-- why section -->
   <section class="contact_us">
      <div class="container">

         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <div class="full1">
                  <form action="index.html">
                     <fieldset>
                        <p>Name:<input type="text" class="custom-input" placeholder="Enter your full name" name="name" required /></p>
                        <p>Email:<input type="email" class="custom-input" placeholder="Enter your email address" name="email" required /></p>
                        <p>Message:<textarea class="custom-input" placeholder="Enter your message" required></textarea></p>
                        <input type="submit" value="Submit" class="custom-button"/>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end why section -->
   
   <!-- arrival section -->
   @include('home.new_arrival')
   <!-- end arrival section -->

   <!-- footer section -->
   @include('home.footer')
   <!-- footer section -->


   <script src="home/js/jquery-3.4.1.min.js"></script>

   <script src="home/js/popper.min.js"></script>

   <script src="home/js/bootstrap.js"></script>
 
   <script src="home/js/custom.js"></script>
</body>

</html>

<style>
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