$(function(){
    if($('.pers').val() ==1 ){
        $('.show').text('%');
    }
    if($('.pers').val() ==2){
        $('.show').text('VND');
    }

            $('.perss').keyup(function(){
                let val = this.value.split('.').join('');                   
               this.value = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            })
})