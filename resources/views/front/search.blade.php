@extends('front.layout')
@section('content')
@section('page_title','Search')

<section id="aa-product-category">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-8">
             <div class="aa-product-catg-content">
                <div class="aa-product-catg-body">
                   <ul class="aa-product-catg">
                      <!-- start single product item -->
                      @if(isset($product[0]))
                      @foreach ($product as $prodArr)
                      <li>
                        <figure>
                          <a class="aa-product-img" href="{{url('product/'.$prodArr->slug)}}"><img src="{{asset('admin_assets/images/'.$prodArr->image)}}" width="200px" height="300" alt="{{$prodArr->name}}"></a>
                          <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$prodArr->id}}','{{$product_attr[$prodArr->id][0]->size}}','{{$product_attr[$prodArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="{{url('product/'.$prodArr->slug)}}">{{$prodArr->name}}</a></h4>
                            <span class="aa-product-price">RS {{$product_attr[$prodArr->id][0]->price}}</span><span class="aa-product-price"><del>{{$product_attr[$prodArr->id][0]->mrp}}</del></span>
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
                   </ul>
                   <!-- quick view modal -->
                </div>
                <div class="aa-product-catg-pagination">
                   <nav>
                      <ul class="pagination">
                         <li>
                            <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                         </li>
                         <li><a href="#">1</a></li>
                         <li><a href="#">2</a></li>
                         <li><a href="#">3</a></li>
                         <li><a href="#">4</a></li>
                         <li><a href="#">5</a></li>
                         <li>
                            <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                         </li>
                      </ul>
                   </nav>
                </div>
             </div>
          </div>

       </div>
    </div>
 </section>

 <input type="hidden" id="qty"  value="1"/>
 <form id="frmAddToCart">
  <input type="hidden" id="color_id" name="color_id"/>
  <input type="hidden" id="size_id" name="size_id"/>
  <input type="hidden" id="pqty" name="pqty"/>
  <input type="hidden" id="product_id" name="product_id"/>
  @csrf
  </form>

  @endsection
