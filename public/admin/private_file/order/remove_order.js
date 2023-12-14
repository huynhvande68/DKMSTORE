function removeorder(e){
    e.preventDefault()
  const url_data = $(this).data('url')
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
           url: url_data,
           success: function(data){
             if(data.code == 200){        
                Swal.fire(
                    'Xóa thành công!',
                    'Sản phẩm đã được xóa.',
                    'success'
                  )   
                  $('.partents').children().remove()                   
                 $('.partents').append(data.main)   
                 $('body').append("<script src ='/admin/private_file/order/cofirm_order.js'></script>");  
                 $('body').append("<script src ='/admin/private_file/order/remove_order.js'></script>");  
                    
             }                               
           }
         }) 
        }
  })
}
$(function(){
$('.remove-confirm').click(removeorder)
})