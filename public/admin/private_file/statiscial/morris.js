
  // morris chat js
  var chart = new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    hideHover: true,
    data: [{period:'10/2/2021',quantity:0,price:0}],
    // The name of the data record attribute that contains x-values.
    xkey: 'period',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['quantity','price'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Tổng số đơn đã bán','Doanh thu ']
  }) 
  var aer = new Morris.Donut({
    // ID of the element in which to draw the chart.
    element: 'sales_country',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    hideHover: true,
    data: [
      {label: "", value: 0},
     
    ]
  }) 
