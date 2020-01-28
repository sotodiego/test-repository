
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agence</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  

   <style type="text/css">
    @font-face {
      font-family: 'gotham';
      src: url('{{url('/assets/fonts/gotham/Gotham.ttf')}}');
      src: local('☺'), url('{{url('/assets/fonts/gotham/Gotham.woff')}}') format('woff'), url('{{url('/assets/fonts/gotham/Gotham.ttf')}}') format('truetype'), url('{{url('/assets/fonts/gotham/Gotham.svg')}}') format('svg');
          font-weight: normal;
          font-style: normal;
     }

     body{
      font-family: 'gotham';
     }
   </style>

</head>

<body>

@include("layout.navbar")
@yield("nav")

@include("layout.aside")
@yield("aside")

         

    <!-- Footer -->
 

@include("layout.footer")
@yield("footer")

<script type="text/javascript">
  //Fechas
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fecha');
    var instances = M.Datepicker.init(elems, { format: 'yyyy-mm-dd' });
  });

    //sidenav mobile
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });

 
  


</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>


