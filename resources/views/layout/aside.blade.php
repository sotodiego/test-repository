    <div class="col s12 m3 l3">

        <h3 class="my-2">Consultas</h3>
         <div class="collection">


	        <form method="post" id="consulta" >
 				{{ csrf_field() }}
 				<div class="">
 					<h5><i class="material-icons left">date_range</i>Periodos</h5>
	        		<hr style="border-width: 1px;border-color: #42a5f5">
	        		<div class="">
	        			<div class="s12">
	        				<input type="text" name="fecha1" class="fecha" placeholder="Fecha Desde..." value="2004-01-01">
	        			</div>
	        			<div class="s12">
	        				<input type="text" name="fecha2" class="fecha" placeholder="Fecha Hasta..." value="2010-01-01">
	        			</div>
	        			
	        		</div>
				</div>
	        		<div class="">
		        		<h5><i class="material-icons left">group</i>Consultores</h5>
		        		<hr style="border-width: 1px;border-color: #42a5f5">
		        		@foreach($consultores as $cliente)               
			                    <a href="#!" class="collection-item">
						        	<label>
							        <input type="checkbox" name="users[]" value="{{$cliente->usu}}"  class="checkbox filled-in" />
							        <span>{{$cliente->no_usuario}}</span>
							      </label>
			  					</a>
	             	    @endforeach
             	    </div>
      <hr style="border-width: 1px;border-color: #42a5f5">

		  <div class="row">  
			  	
			  <button type="submit"  onclick="submitForm('/relatorio')"  class="blue lighten-1 waves-effect waves-light btn-small s4" ><i class="material-icons left">grid_on</i>Relatorio</button>

			  <button type="submit" onclick="submitForm('/grafico')" class="blue lighten-1 waves-effect waves-light btn-small s4"><i class="material-icons left">insert_chart</i>Gráfico</button>

			  <button type="submit"  onclick="submitForm('/pie')"  class="blue lighten-1 waves-effect waves-light btn-small s4"><i class="material-icons left">pie_chart</i>Pizza</button>  				
		  </div>

        </form>
      </div>

      </div>


<script>
    function submitForm(action)
    {
        document.getElementById('consulta').action = action;
        document.getElementById('consulta').submit();
    }

</script>

    
 