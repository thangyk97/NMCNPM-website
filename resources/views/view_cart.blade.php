@extends('layouts.master')

@section('title')
	Test space | E-shop
@endsection
	
@section('content')
<section>
    <div class='container'>
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        
        @foreach ( $cart->items as $item)
            <br><h3>{{$item['item']->name.' '.$item['qty']}}</h3>


        @endforeach

    </div>   
</section>

@endsection