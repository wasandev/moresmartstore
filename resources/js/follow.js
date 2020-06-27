$(document).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.action-follow').click(function(){

        var user_id = $(this).data('id');
        var cObj = $(this);
        //var c = $(this).parent("div").find(".tl-follower").text();
        var c = $(".tl-follower").text();

        $.ajax({
           type:'POST',
           url:'/followUserRequest',
           data:{user_id:user_id},
           dataType: 'json',
           success:function(data){
              console.log(data.success);
              if(data.success == "unfollow"){
                cObj.find("strong").text("ติดตาม");
                $(".tl-follower").text(parseInt(c)-1);
              }else{
                cObj.find("strong").text("เลิกติดตาม");
                $(".tl-follower").text(parseInt(c)+1);
            }

           }
        });
    });


});
