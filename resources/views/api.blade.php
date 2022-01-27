<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container" id="list">



    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    //this for different server api call
    $.ajax({
            type: "get",
            url: "https://jsonplaceholder.typicode.com/posts",
            success: function (response) {
                        //for and for each both are ok
                        //for(let i=0; i<response.length;i++)
                        //$('#list').append('<div  class=" my-5 bg-success"><h1>'+response[i].title+'</h1><br>'+'<h3>'+response[i].body+'</h3></div>');
                // response.forEach(function(response) {
                //     $('#list').append('<div  class=" my-5 bg-success"><h1>'+response.title+'</h1><br>'+'<h3>'+response.body+'</h3></div>');
                // });
            }
        });

    </script>
    <script>
//call from own api data is inside extra array thats why response.product (here product is array name)
           $.ajax({
               type: "get",
               url:"http://127.0.0.1:8000/api/product",
               success: function (response) {
                 response.product.forEach(function(response) {
                     $('#list').append('<div  class=" my-5 bg-success"><h1>'+response.name+'</h1><br>'+'<h3>'+response.description+'</h3></div>');
                 });
               }
           });
</script>
  </body>
</html>
