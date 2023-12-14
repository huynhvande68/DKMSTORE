
function delete_product(e){
    e.preventDefault();
    let url_data = $(this).data('url');
    let that = $(this);
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
                      that.parent().parent().remove();
                  }
                },
                error: function(data){

                }
              })
      
        }
      })
}
$(function(){

    $(" .delete_switch ").click(delete_product);
});
