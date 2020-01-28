@extends("layout.template")
 
@section("nav")

<div class="row">
      @section("aside")

      <div class="col s12 l9 m9">

      @if (!empty($datos))
        <h3 class="my-2">Relatorio</h1>
        <div class="row">
            <table class="responsive-table">
              <thead>
                <tr style="background-color: #42a5f5">
                     <th>Período</th>
                     <th>Receita Líquida</th>
                     <th>Custo Fixo</th>
                     <th>Comissão</th>
                     <th>Lucro</th>
                </tr>
              </thead>

              <tbody>

              @foreach($datos as $d) 
                    <tr >
                      <td>{{$d->period}}</td>
                      <td>{{$d->recliq}}</td>
                      <td>{{$d->bruto}}</td>
                      <td>{{$d->comision}}</td>
                      <td>{{$d->beneficio}}</td>
                    </tr>

               @endforeach

                  @if (!empty($totales))
                    <tr>                    
                        <td style="background-color: #42a5f5">Saldo</td>                     
                        @foreach($totales as $value)                     
                         <td style="background-color: #42a5f5">{{$value}}</td>                      
                        @endforeach
                     
                    </tr>
                 

                  @endif
              </tbody>
            </table>
                    
        </div>
     
   @elseif(!empty($result) or !empty($pie))
          <figure class="highcharts-figure">
               <h3 class="my-2">Gráfico</h1>
               <div id="container"></div>
             
          </figure>
           @else
                 <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    M.toast({html: 'No hay valores!'})
                      });
                            
                  </script>      


            @endif
 
      </div>

</div>
    
@endsection


 <div class="container">

    <div class="row">
      
    
      <!-- /.col-lg-3 -->

     
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
@section("footer")


@endsection
