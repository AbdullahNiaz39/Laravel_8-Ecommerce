@extends('front.layout')
@section('content')
@section('page_title',$product[0]->name)

<section id="aa-catg-head-banner">
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">

       </div>
      </div>
    </div>
   </section>
   <!-- / catg header banner section -->

   <!-- product category -->
   <section id="aa-product-details">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="aa-product-details-area">
             <div class="aa-product-details-content">
               <div class="row">
                 <!-- Modal view slider -->
                 <div class="col-md-5 col-sm-5 col-xs-12">
                   <div class="aa-product-view-slider">
                     <div id="demo-1" class="simpleLens-gallery-container">
                       <div class="simpleLens-container">
                         <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('admin_assets/images/'.$product[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('admin_assets/images/'.$product[0]->image)}}" class="simpleLens-big-image"></a></div>
                       </div>
                       <div class="simpleLens-thumbnails-container">

                         @if(isset($product_images[$product[0]->id][0]))
                     @foreach ($product_images[$product[0]->id] as $list )
                     <a data-big-image="{{asset('admin_assets/images/'.$list->images)}}" data-lens-image="{{asset('admin_assets/images/'.$list->images)}}" class="simpleLens-thumbnail-wrapper" href="#">
                        <img src="{{asset('admin_assets/images/'.$list->images)}}" width="50px">
                      </a>
                     @endforeach
                         @endif
                       </div>
                     </div>
                   </div>
                 </div>

                 <!-- Modal view content -->
                 <div class="col-md-7 col-sm-7 col-xs-12">
                   <div class="aa-product-view-content">
                     <h3>{{$product[0]->name}}</h3>
                     <div class="aa-price-block">

                       <span class="aa-product-view-price">RS {{$product_attr[$product[0]->id][0]->price}}</span>
                       <span class="aa-product-view-price"><del>RS {{$product_attr[$product[0]->id][0]->mrp}}</del></span>
                       <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                          @if ($product[0]->lead_time!='')
                          <p class="lead_time">{{$product[0]->lead_time}}</p>
                    @endif
                    </div>
                     <p>{{$product[0]->short_desc}}</p>

                    {{-- Showing Size --}}
                     @if($product_attr[$product[0]->id][0]->size_id>0)
                     <h4>Size</h4>
                     <div class="aa-prod-view-size">
                         @php
                         $arrSize=[];
                         foreach ($product_attr[$product[0]->id] as $size){
                             $attrSize[]=$size->size;
                         }
                         $attrSize=array_unique($attrSize);
                         @endphp

                        @foreach ($attrSize as $size)
                        @if($size!='')
                       <a href="javascript:void(0)" onclick="showColor('{{$size}}')" id="size_{{$size}}" class="size_link">{{$size}}</a>
                      @endif
                      @endforeach
                     </div>
                     @endif


                     {{-- Showing Color --}}
                     @if($product_attr[$product[0]->id][0]->color_id>0)
                     <h4>Color</h4>
                     <div class="aa-color-tag">
                         @foreach ($product_attr[$product[0]->id] as $color)
                    @if($color->color!='')
                       <a href="javascript:void(0)" class="aa-color-{{strtolower($color->color)}} product_color size_{{$color->size}}"  onclick="change_product_color_image('{{asset('admin_assets/images/'.$color->attr_image)}}','{{strtolower($color->color)}}')"></a>
                       @endif
                       @endforeach
                     </div>
                     @endif

                     <div class="aa-prod-quantity">
                       <form action="">
                         <select id="qty" name="qty">
                          @for($i=1;$i<11;$i++)
                            <option  value="{{$i}}">{{$i}}</option>
                         @endfor
                         </select>
                       </form>
                       <p class="aa-prod-category">
                         Model: <a href="#">{{$product[0]->model}}</a>
                       </p>
                     </div>
                     <div class="aa-prod-view-bottom">
                       <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{$product[0]->id}}','{{$product_attr[$product[0]->id][0]->size_id}}','{{$product_attr[$product[0]->id][0]->color_id}}')">Add To Cart</a>
                     </div>
                     <div id="add_to_cart_msg"></div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="aa-product-details-bottom">
               <ul class="nav nav-tabs" id="myTab2">
                 <li><a href="#description" data-toggle="tab">Description</a></li>
                 <li><a href="#technicalSpec" data-toggle="tab">Technical Specfications</a></li>
                 <li><a href="#Uses" data-toggle="tab">Uses</a></li>
                 <li><a href="#warrenty" data-toggle="tab">Warrenty</a></li>
                 <li><a href="#review" data-toggle="tab">Reviews</a></li>

               </ul>

               <!-- Tab panes -->
               <div class="tab-content">
                 <div class="tab-pane fade in active" id="description">
                    <ul>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                     <li> {!! $product[0]->desc !!}</li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="technicalSpec">
                    <ul>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                     <li> {!! $product[0]->technical_specs !!}</li>
                    </ul>
                 </div>
                 <div class="tab-pane fade" id="Uses">
                    <ul>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                     <li> {!! $product[0]->uses !!}</li>
                    </ul>
                 </div>
                 <div class="tab-pane fade" id="warrenty">
                    <ul>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                     <li> {!! $product[0]->warranty !!}</li>
                    </ul>
                 </div>

         <div class="tab-pane fade " id="review">
                  <div class="aa-product-review-area">
                    @if(isset($product_review[0]))
                    <h4>
                      @php
                        echo count($product);
                      @endphp
                      Reviews for {{  $product[0]->name}}</h4>
                    <ul class="aa-review-nav">
                      @foreach ($product_review as $list)
                       <li>
                           <div class="media-body">
                             <h4 class="media-heading"><strong>{{ $list->name }}</strong> - <span>{{getByDate($list->added_on) }}</span></h4>
                             <div class="aa-product-rating">
                               <span id="login_msg">{{ $list->rating }}</span>

                             </div>
                             <p>{{ $list->review }}</p>
                           </div>

                       </li>
                       @endforeach
                    </ul>
                    @else
                    <h2> No review found</h2>
                    @endif
                  </div>
                    <form id="frmProductReview" class="aa-review-form">

                    <h4>Add a review</h4>
                    <div class="aa-your-rating">
                      <p>Your Rating</p>
                      <select class="form-control" name="rating" required>
                          <option value="">Select Rating</option>
                          <option value="Worst">Worst</option>
                          <option value="Bad">Bad</option>
                          <option value="Good">Good</option>
                          <option value="Very Good">Very Good</option>
                          <option value="Fantastic">Fantastic</option>
                      </select>
                      {{-- <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a>
                      <a href="#"><span class="fa fa-star-o"></span></a> --}}
                    </div>
                    <!-- review form -->
                         <div class="form-group">
                         <label for="message">Your Review</label>
                         <textarea class="form-control" rows="3" required id="message" name="review"></textarea>
                       </div>
                       <input type="hidden" name="products_id" value="{{ $product[0]->id }}">
                       <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                       @csrf
                    </form>
                    <div id="login_msg"></div>
                  </div>

                 </div>
               </div>
             </div>
             <!-- Related product -->
             <div style="margin-top: 200px;" class="aa-product-related-item ">
               <h3 style="text-align: center;">Related Products</h3>
               <ul class="aa-product-catg aa-related-item-slider">
                 <!-- start single product item -->
                 @if(isset($related_product[0]))
                 @foreach ($related_product as $prodArr)
                 <li>
                   <figure>
                     <a class="aa-product-img" href="{{url('product/'.$prodArr->slug)}}"><img src="{{asset('admin_assets/images/'.$prodArr->image)}}" width="200px" height="300" alt="{{$prodArr->name}}"></a>
                     <a class="aa-add-card-btn"href="{{url('product/'.$prodArr->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                       <figcaption>
                       <h4 class="aa-product-title"><a href="{{url('product/'.$prodArr->slug)}}">{{$prodArr->name}}</a></h4>
                       <span class="aa-product-price">RS {{$related_product_attr[$prodArr->id][0]->price}}</span><span class="aa-product-price"><del>{{$related_product_attr[$prodArr->id][0]->mrp}}</del></span>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">

                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>

                   </div>
                   <!-- product badge -->

                 </li>
                 <!-- start single product item -->
                 @endforeach
                 @else
                 <li>
                     <figure>
                 NO Data Found
                     </figure>
                 </li>
                 @endif
                  <!-- start single product item -->


               </ul>

             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- / product category -->


   <!-- Subscribe section -->
   <section id="aa-subscribe">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="aa-subscribe-area">
             <h3>Subscribe our newsletter </h3>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
             <form action="" class="aa-subscribe-form">
               <input type="email" name="" id="" placeholder="Enter your Email">
               <input type="submit" value="Subscribe">
             </form>
           </div>
         </div>
       </div>
     </div>
   </section>
   <form id="frmAddToCart">

    <input type="hidden" id="color_id" name="color_id"/>
   <input type="hidden" id="size_id" name="size_id"/>
   <input type="hidden" id="pqty" name="pqty"/>
   <input type="hidden" id="product_id" name="product_id"/>
   @csrf
   </form>
  @endsection
