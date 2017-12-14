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

 

            <!-- form upload -->
            <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-10 clearfix">
                    <div class="bill-to">
                        <p>Informations edit product</p>
                        <div class="form-one">
                            <form id="myForm" action="{{route('edit')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input id="image" type="file" name="image" placeholder="image" required>
                                <input type="text" name="name" placeholder="Product name*" required>
                                <input type="text" name="total" placeholder="amount*" required>
                                <input type="text" name="price" placeholder="price*" required>
                                <select name="type">
                                    <option value="men">mens</option>
                                    <option value="women">womens</option>
                                    <option value="kid">kids</option>
                                    <option value="shoes">shoes</option>
                                    <option value="bag">bags</option>
                                </select>
                                <input class="btn btn-primary" type="submit" value="Edit product">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	</section><!--/#do_action-->
@endsection