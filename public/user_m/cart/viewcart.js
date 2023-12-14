function addCart(url,quantity){

    $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "GET",
        url: url,
        data: {quantity:quantity},
        dataType: 'json',
        success: function(data){
            if(data.code === 200){
                $('.item-count').text(data.num);
                alert(data.message);     
            }
        }
      });

}
$(function(){
    $('.add-cart').click(function(e){
        e.preventDefault();
        url = $(this).data('url');
        quantity = $('.quantity').val();
            addCart(url,quantity);
        });
    $('.modal-cart').click(function(e){
        e.preventDefault();
        url = $(this).data('url');
        quantity = $('.quantity-modal').val();
                addCart(url,quantity);            
        });
    $('.sing-cart').click(function(e){
        e.preventDefault();
        url = $(this).data('url');
        quantity = $('.quantity-sing').val();
                addCart(url,quantity);            
        });
})