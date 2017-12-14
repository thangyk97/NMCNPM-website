<html>
<div>
    <div>

        <form action="{{route('changeStatus')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="text" name="status" value="<?php echo csrf_token(); ?>">
            
            <button type="submit">click!</button>

        </form>



    </div><!--/login form-->
</div>  
</html>
