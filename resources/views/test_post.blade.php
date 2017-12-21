<html>
<div>
    <div>

        <form action="{{route('employee2manager')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="text" name="data" value="">
            
            <button type="submit">click!</button>

        </form>



    </div><!--/login form-->
</div>  
</html>
