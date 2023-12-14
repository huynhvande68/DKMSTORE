// select product follow price
function fetch_fillter(value)
{
    $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "GET",
        url: "http://127.0.0.1:8000/index/fillter_product",
        data: {param:value},
        dataType: 'json',
        success: function(data){
                
            if(data.code == 200){
                  $('#pjax-container').children().remove();           
                 $('#pjax-container').append(data.table_data); 
                 $('body').append("<script src ='user_m/cart/viewcart.js'></script>");  
            }  
        }
      });
}

    $('.customs_sel_box').change(function() 
    {
        let value =  $(this).val();    
        fetch_fillter(value);
        
    });

// input search product ajax

function search_ajax(value)
{
    $.ajax({
        contentType: "application/json; charset=utf-8",
        type: "GET",
        url: "http://127.0.0.1:8000/index/search_ajax",
        data: {param:value},
        dataType: 'json',
        success: function(data){           
            if(data.code == 200){
                $('#pjax-container').children().remove();           
               $('#pjax-container').append(data.table_data); 
               $('body').append("<script src ='user_m/cart/viewcart.js'></script>");  
          }         
        }
      });
}
$('.search_ajax').keyup(function() 
{
    let value =  $(this).val();   
    search_ajax(value);
    
});
