
jQuery(document).ready(function() {
    jQuery('.follow').click(function(){
    jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
        var id = $(this).data('id');
        console.log(id);
        var reference= $(this);
            jQuery.ajax({
            type:'POST',
            url:'/followUserRequest',
            data:{user_id:id},
            success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                    reference.find("strong").text("Follow");
                }else{
                    reference.find("strong").text("UnFollow");
                }
            }
        });
});
});
