
function remove_validation(){
  if($("input.is-invalid")){
    $("input.is-invalid").removeClass('is-invalid');
    $(".alert-danger").removeClass();
  }
  else{
  }
}
$(function(){
    $('.cate_coupon').change(function(){
        if($(this).val() == 1 || $(this).val() == 2){
            $('.percent').addClass('active');
            
            if($(this).val() == 1){
                $('.show_mess').text('%');
                $('.percent').click(function(){
                    this.value = '';                   
                                       
                })
            }
            if($(this).val() == 2){
                $('.show_mess').text('VND');
                $('.percent').keyup(function(){
                    let val = this.value.split('.').join('');                   
                   this.value = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                })
            }
        }  
        else{
            $('.percent').removeClass('active');
            $('.show_mess').text('');
        } 
    })

    // remove validation
    $("input.form-control").click(remove_validation);
  
})
