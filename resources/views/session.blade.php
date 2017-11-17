@extends('layouts.master')

@section('title')
	Test space | E-shop
@endsection
	
@section('content')
    <div>
        <?php

            foreach ( $cart->items as $item) {
                echo $item['item']->name.' '.$item['qty'].'<br>';
            }

        ?>

    </div>
@endsection