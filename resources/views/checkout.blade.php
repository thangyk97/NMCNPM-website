@extends('layouts.master')

@section('title')
	Checkout | E-shop
@endsection
	
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			@if ($cart)
				<div class="register-req">
					<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
				</div><!--/register-req-->

				<div class="shopper-informations">
					<div class="row">
						<div class="col-sm-10 clearfix">
							<div class="bill-to">
								<p>Bill To</p>
								<div class="form-one">
									<form id="myForm" action="{{route('postInforCustomer')}}" method="post">
										{{ csrf_field() }}
										<input id="companyName" type="text" name="companyName" placeholder="Company Name" >
										<input type="text" name="email" placeholder="Email*" required>
										<input type="text" name="title" placeholder="Title" >
										<input type="text" name="name" placeholder="Name *" required>
										<input type="text" name="phone" placeholder="Phone *" required>
										<input type="text" name="address1" placeholder="Address 1 *" required>
										<input type="text" name="address2" placeholder="Address 2">
										<input class="btn btn-primary" type="submit" value="Order">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="review-payment">
					<h2>Review & Payment</h2>
				</div>
			@endif
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
						@if($cart != null)
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
										<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
									</td>
								</tr>
							@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{'$'.$cart->totalPrice}}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{'$'.$cart->totalPrice}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
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
			<div>
				<a class="btn btn-primary" href="{{url('/')}}">Back to shop</a>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection