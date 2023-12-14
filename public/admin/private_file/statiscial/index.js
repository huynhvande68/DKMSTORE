$(function(){

    $('#loc').click(function(e){
        e.preventDefault()
        const url = $(this).data('url')
        const form = $('.from').val()
        const to =   $('.to').val()
        $.ajax({           
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },     
           type: 'POST',
           url: url,
           dataType: "json",
           data: {
                form: form,
                    to: to    },         
           success: function (data){        
              chart.setData(data.main)
         
           }
        })
    })

  
   
})