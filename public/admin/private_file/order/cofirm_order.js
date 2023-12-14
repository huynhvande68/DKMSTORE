  // let a = document.querySelector('.confirm-wait')
   
  $('.confirm-wait').click(function(){
    const url_data = $(this).data('url')
      let id = $(this).attr('id')
      $(this).prop('checked', true)
      $(this).attr("disabled", true)
      $.ajax({
               type: "GET",
               url: url_data,
               success: function(data){
                 if(data.code == 200){        
                   Swal.fire(
                   'Thành công!',
                   'Bạn đã xác nhận đơn hàng!',
                   'success'
                   )  
                   $('.st'+id+'').removeClass("badge-danger")
                   $('.st'+id+'').addClass("badge-success")
                   $('.st'+id+'').text('Đã xác nhận')
                 }
               },
               error: function(data){

               }
             }) 
  })