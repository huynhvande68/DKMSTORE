function updateCart()
{
  
    url = $('.update-cart-url').data('url');
    console.log(name);
    let input = $('input.input');
    let nam = [];
    let arr = [];
   for(let i =0 ;i< input.length;i++)
   {
      
         arr.push($('input.input')[i].value);
        nam.push($('input.input').eq(i).attr("name"));
   }

//    call ajax
    $.ajax({
        type: "GET",
        url: url,
        data: {"val":arr , "stt":nam},
        dataType: 'json',
        success: function(data){
            if(data.code === 200){
                $('.ds').empty();
                    $('.ds').html(data.cartComponent);
               
                alert(data.message);
                
                $('body').append("<script src='assets/js/count.js'></script>");
                $('body').append("<script src ='user_m/cart/cartupdate.js'></script>");
                $('body').append("<script src ='user_m/cart/deletecart.js'></script>");
                $('body').append("<script src ='user_m/cart/couponcart.js'></script>");
                
            }
        }
    });
}

$(function(){
$('.cart-update').click(updateCart);
});