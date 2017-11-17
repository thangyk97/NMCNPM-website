<html>
<div>
    <div 
        <h2>Login to your account</h2>
        <form action="{{route("postForm")}}" method="post" >
        {{ csrf_field() }}
            <input type="text" name="name" placeholder="Name"/>
            <input type="text" name="password" placeholder="Password"/>
            <button type="submit" class="btn btn-default">
                Login
            </button>

        </form>
    </div><!--/login form-->
</div>  
</html>

<!-- <section>
    <div class='container'>

            @foreach ( $cart->items as $item)
                <br><h3>{{$item['item']->name.' '.$item['qty']}}</h3>


            @endforeach

    </div>   
</section> -->
