
$(function () {
    var user_type;

    $(document).ready(function(){
        $.ajax({
            url: baseURL+'index.php/home/check_usertype',
            dataType: 'json',

            success: function(response){
                user_type = response;
            }
        })
    });

    $(document).scroll(function () {
        var $nav = $("#nav");
        var addClass = user_type + ' scrolled';
        console.log(addClass);
        $nav.toggleClass( addClass, $(this).scrollTop() > $nav.height());
    });
});