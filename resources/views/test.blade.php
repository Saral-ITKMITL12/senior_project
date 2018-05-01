<html>
   <head>
      <title>Ajax Example</title>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   </head>
   <body>
     <table id="test" border="1">
       <thead>
         <tr>
           <th>ID</th>
           <th>User id</th>
           <th>Auction Product id</th>
           <th>Bid price</th>
           <th>Created At</th>
         </tr>
       </thead>
       <tbody>

       </tbody>
       <table>
     <script>
        function getMessage(){
           $.ajax({
              type:'GET',
              url:'/test',
              data:'_token = <?php echo csrf_token() ?>',
              success:function(data){
                $("#test > tbody").empty();
                for (var i = 0, len = data.length; i < len; i++) {
                  console.log(data[i])
    								var tr = "<tr>";
    								tr += "<td>" + data[i].id + "</td>";
    								tr += "<td>" + data[i].user_id + "</td>";
                    tr += "<td>" + data[i].auction_product_id + "</td>";
    								tr += "<td>" + data[i].bid_price + "</td>";
    								tr += + "<td>" + data[i].created_at + "</td>";
                    $('#test > tbody').append(tr+"</tr>")
                }
              }
           });
        }
        setInterval(getMessage, 100);


     </script>

   </body>

</html>
