 <div class="row" >
           <h3 class="my-2">Relatorio</h3>
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