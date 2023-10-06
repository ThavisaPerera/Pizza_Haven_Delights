<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Popular <span>Products</span>
               </h2>
            </div>
            <div class="row">

               @foreach($item as $item)

                   <div class="col-sm-6 col-md-4 col-lg-4">
                      <div class="box">
                         <div class="option_container">
                            <div class="options">
                               <a class="option1">
                                 <form action="{{url('add_cart',$item->id)}}" method="Post">

                                    @csrf

                                    <input class="option1" type="submit" value="Add To Cart">
                                 </form>
                               </a>
                               <a class="option2">
                                 <form action="{{url('add_cart',$item->id)}}" method="Post">

                                    @csrf

                                    <input class="option2" type="submit" value="Buy Now">
                                 </form>
                               </a>
                            </div>
                         </div>
                         <div class="img-box">
                            <img src="item/{{$item->image}}" alt="">
                         </div>
                         <div class="detail-box">
                            <h5>
                               {{$item->title}}
                            </h5>
                            <h6>
                               ${{$item->price}}
                            </h6>
                         </div>
                      </div>
                   </div>

               @endforeach

            </div>
         </div>
      </section>