<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">

<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/ajax') }}",
                    method: 'get',
                    data: {
                        name: jQuery('#name').val(),
                        quantity: jQuery('#quantity').val(),
                        price: jQuery('#price').val()
                    },
                    success: function(result){
                        jQuery('#tablediv').html(result);
                        console.log(result);
                    }
                });
            });
        });

    </script>
    <title>Product Detail</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <h2>Product Detail</h2>

    <form action="{{ url('/') }}" method="GET" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Product name:</label>
            <input type="text" class="form-control" name="name" id="name" value="" required autofocus>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity in stock:</label>
            <input type="text" class="form-control" name="quantity" id="quantity" value="" required autofocus>
        </div>

        <div class="form-group">
            <label for="price">Price per item:</label>
            <input type="text" class="form-control" name="price" id="price" value="" required autofocus>
        </div>
        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="container" id="tablediv">
    <?php print $contents ?>
</div>
</body>
</html>