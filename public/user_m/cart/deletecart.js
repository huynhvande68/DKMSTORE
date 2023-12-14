function deleteCart(e){
e.preventDefault();
path = $(this).data('url');

Swal.fire({
    title: 'Bạn muốn xóa?',
    text: "Bạn sẽ không thể hoàn tác lại sản phẩm !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "GET",
            url: path,
            success: function(data){
                if(data.code === 200){
                  
                    Swal.fire(
                        'Xóa thành công!',
                        'Sản phẩm đã được xóa.',
                        'success'
                      )
                    
                    //   jsonObject = JSON.parse(data);                       
                         $('.ds').children().remove();                      
                         $('.ds').append(data.cartComponent);
                         $('body').append("<script src='assets/js/count.js'></script>");
                         $('body').append("<script src ='user_m/cart/cartupdate.js'></script>");
                         $('body').append("<script src ='user_m/cart/deletecart.js'></script>");
                         $('body').append("<script src ='user_m/cart/couponcart.js'></script>");
                }
            }
        });
    }
  })       


}
$(function(){
        $('.delete-cart').click(deleteCart);
    });