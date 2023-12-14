
var ctr = document.getElementById("country");
var c = document.getElementById("city");
var w = document.getElementById("wards");
function show(){
  let as =ctr.value;
  
  $.ajax({
    contentType: "application/json; charset=utf-8",
    type: "GET",
    url: 'http://127.0.0.1:8000/cart/province',
    data: {number:as},
    dataType: 'json',
    success: function(data){
      if(data.code === 200)
      {
          c.innerHTML = data.html;
      }
    }
  });

}
ctr.onchange=show;
show();
//wards
function showwards(){
    let as =c.value;
    
    $.ajax({
      contentType: "application/json; charset=utf-8",
      type: "GET",
      url: 'http://127.0.0.1:8000/cart/district',
      data: {number:as},
      dataType: 'json',
      success: function(data){
        if(data.code === 200)
        {
            w.innerHTML = data.html;
        }
      }
    });
  
  }
  c.onchange=showwards;
  showwards();

 
  $('.dvc').click(function(){
    $('.pau').removeClass('payment-text');
    $('.pg').removeClass('payment-text');
  })

