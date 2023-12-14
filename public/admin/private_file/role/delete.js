function deleteBlog(e){
    e.preventDefault();
    let url = $(this).data('url');  
Swal.fire({
    title: 'Bạn chắc chứ?',
    text: "Bạn sẽ không thể hoàn tác lại chức năng !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
   })
.then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            type: "POST",
            url: url,
            success: function(data){
              if(data.code == 200){
                Swal.fire(
                    'Xóa thành công!',
                    'Chức năng đã được xóa.',
                    'success'
                  )
                
                  $('.delete-role').children().remove();
                  $('.delete-role').append(data.main);
                  $('body').append("<script src='/admin/private_file/role/delete.js'></script>");
              }
            }
          });
  
    }
  })
}
$(function () { 
    $('.delete').click(deleteBlog)
 })