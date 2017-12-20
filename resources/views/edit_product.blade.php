@extends('layouts.master')

@section('title')
	Edit product | E-shop
@endsection
	
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Edit product</li>
				</ol>
			</div>

 

            <div class="col-sm-12 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Features Items</h2>

                @foreach ($products as $item)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$item->link_img}}" alt="" />
                                        <h2>{{$item->price}}</h2>
                                        <h4>id: {{$item->id}}</h2>
                                        <p>{{$item->name}}</p>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <form action="{{route('edit',['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <input hidden type="text" value="{{$item->id}}">
                                        <input id="image" type="file" name="image" placeholder="image" required>
                                        <button type="submit">add image</button>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!--features_items-->
        </div>

        </div>
	</section><!--/#do_action-->
@endsection