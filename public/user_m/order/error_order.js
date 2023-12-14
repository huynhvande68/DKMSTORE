function error(e){
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
                    'Hủy đơn thành công!',
                    'Đơn đã được hủy.',
                    'success'
                  )                      
                  $('#my-account_area').children().remove()                   
                 $('#my-account_area').append(data.main)   
                 $('.dasboard').removeClass('active')
                 $('.dasabc').removeClass('active')
                 $('.dasabc').removeClass('show')
                 $('.orders-ok').addClass('active')
                 $('.orderabc').addClass('active')
                 $('.orderabc').addClass('show')
                 $('body').append("<script src ='/user_m/order/error_order.js'></script>");  
          
                    
             }                               
           }
         }) 
        }
  })
}
$(function(){
$('.huy').click(error)
})