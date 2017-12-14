@extends('layouts.master')

@section('title')
	Shop | E-shop
@endsection
	
@section('content')
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('home')}}">All</a></h4>
							</div>
						</div>							

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('category', ['type'=>'men'])}}">Mens</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('category', ['type'=>'women'])}}">Womens</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('category', ['type'=>'kid'])}}">Kids</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('category', ['type'=>'bag'])}}">Bags</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{url('category', ['type'=>'shoes'])}}">Shoes</a></h4>
							</div>
						</div>
					</div><!--/category-products-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>

						@foreach ($products as $item)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$item->link_img}}" alt="" />
												<h2>{{$item->price}}</h2>
												<p>{{$item->name}}</p>
												<a href="{{route('addToCart', ['id' => $item->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection