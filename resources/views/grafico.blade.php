<style type="text/css">
  
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

 <figure class="highcharts-figure">
               <h3 class="my-2">Gráfico</h1>
               <div id="container"></div>
             
</figure>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
<script type="text/javascript">
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