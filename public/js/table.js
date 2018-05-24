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