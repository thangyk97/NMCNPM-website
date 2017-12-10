@extends('layouts.master')

@section('title')
	Cart | E-shop
@endsection
	
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>


			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if($cart)
							@foreach($cart->items as $storedItem)
								<tr>
									<td class="cart_product">
										<a href=""><img src="{{URL::asset($storedItem['item']->link_img)}}" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href="">{{$storedItem['item']->name}}</a></h4>
										<p>Web ID: {{$storedItem['item']->id}}</p>
									</td>
									<td class="cart_price">
										<p>{{'$'.$storedItem['item']->price}}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up" href="{{URL('cart')}}"> + </a>
											<input class="cart_quantity_input" type="text" name="quantity" value="{{$storedItem['qty']}}" autocomplete="off" size="2">
											<a class="cart_quantity_down" href=""> - </a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">{{'$'.$storedItem['price']}}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{route('delete_item', ['id' => $storedItem['item']->id])}}"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td>
									<h3>empty card</h3>
								</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
	@if ($cart)
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{'$'.$cart->totalPrice}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{'$'.$cart->totalPrice}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="container">
			<a class="btn btn-primary" href="{{url('/')}}">Back to Shop</a>
		</div>
	@endif
	</section><!--/#do_action-->
@endsection