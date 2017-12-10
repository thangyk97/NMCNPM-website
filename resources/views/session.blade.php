@extends('layouts.master')

@section('title')
	Test space | E-shop
@endsection
	
@section('content')
<section>
    <div class='container'>

            @foreach ( $cart->items as $item)
                <br><h3>{{$item['item']->name.' '.$item['qty']}}</h3>


            @endforeach

    </div>   
</section>

@endsection