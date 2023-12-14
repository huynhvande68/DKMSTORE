function delete_coupon(e)
{
e.preventDefault();
let url = $(this).data('url');  
Swal.fire({
    title: 'Bạn chắc chứ?',
    text: "Bạn sẽ không thể hoàn tác lại sản phẩm !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
   })
.then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "GET",
            url: url,
            success: function(data){
              if(data.code == 200){
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã được xóa.',
                    'success'
                  )
                  $('.thathere').children().remove();
                  $('.thathere').append(data.cartComponent);
                  $('body').append("<script src='/admin/private_file/coupon/delete_coupon.js'></script>");
              }
            },
            error: function(data){

            }
          });
  
    }
  })
}
$(function(){
$('.delete_coupon').click(delete_coupon);
});