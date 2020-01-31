
 <div class="row" >
                              
    @foreach($result['rows'] as $rows=>$val)  
           
            <table class="responsive-table container" style="margin: 15px">
              <thead> 
               <tr style="background-color: #42a5f5">       
                  <th colspan="5">{{$rows}}</th>             
                </tr>              
                <tr style="background-color: #42a5f5">                    
                     <th>Período</th>
                     <th>Receita Líquida</th>
                     <th>Custo Fixo</th>
                     <th>Comissão</th>
                     <th>Lucro</th>
                </tr>               
              </thead>
              <tbody>    
                  @foreach ($val as $row)
                            <tr>                             
                              <td>{{$row->period}}</td>
                              <td>{{$row->recliq}}</td>
                              <td>{{$row->bruto}}</td>
                              <td>{{$row->comision}}</td>
                              <td>{{$row->beneficio}}</td>
                            </tr>
                  @endforeach 
                             <tr>                
                                <td style="background-color: #42a5f5">Saldo</td>
                                @foreach($result['totals'][$rows] as $total)  
                                <td>{{$total}}</td>
                                @endforeach 
                             </tr>
                 
              </tbody>
            </table>  
        @endforeach    
                          
  </div>