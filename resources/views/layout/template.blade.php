
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

   
      #container {
          height: 400px; 
      }

      .highcharts-figure, .highcharts-data-table table {
          min-width: 310px; 
          max-width: 800px;
          margin: 1em auto;
      }

      .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #EBEBEB;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
      }
      .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
      }
      .highcharts-data-table th {
        font-weight: 600;
          padding: 0.5em;
      }
      .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
          padding: 0.5em;
      }
      .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
      }
      .highcharts-data-table tr:hover {
          background: #f1f7ff;
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
 <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
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

  // Gráficos

  Highcharts.chart('container', 
 
      {     
        chart: {
          @if(!empty($pie))//si existe pie
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
          
            @else // Columns
            type: 'column', 
            @endif

        },
        title: {
            text: 'Rendimiento de Consultores'
            },
         @if(!empty($pie))//si existe pie
              accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            
                        }
                    }
                },
                series: [{
                      name: 'Consultores',
                      colorByPoint: true,
                      data: [
                        @foreach($pie as $key)
                         {
                              name: "{{$key->name}}",
                              y: {{$key->y}},                              
                              
                          },
                        @endforeach                         
                      ]

                   }]
         @else //Columns
              xAxis: {
                  categories: ['Ene', 'Feb','Mar', 'Abr', 'May', 'Jun','Jul','Agos','Sep','Oct','Nov','Dic']
              },
              credits: {
                  enabled: false
              },
              series: [  
              @if(!empty($result))
                  @foreach($result as $key)
                    {
                      name: "{{$key['name']}}",
                      data:  {{json_encode($key['data'])}},
                      @if($key['name']=='Custo Fixo Médio')
                      type: 'spline',
                      @endif

                    },       
                  @endforeach 
              @endif
              ]
        @endif
      }
  
);



</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/
</body>

</html>


