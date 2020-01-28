<?php

namespace App\Http\Controllers;
//use Illuminate\Database\MySqlConnection;
use DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

 
class InicioController extends Controller
{
    
    public function index()
    {  
        $consultores=$this->consultores();
        return view('welcome', compact(['consultores']));       
      
    }


    public function relatorio(Request $request)
    {
        $consultores= $this->consultores();
     
        $users = str_replace(['[', ']'], '', json_encode($request->users));
        $relatorio = DB::select("SELECT co_usuario,period,round(recliq,2) recliq,bruto,round(comision,2) comision,round(round(recliq,2)-(bruto+round(comision,2)),2) beneficio FROM relatorio WHERE (period BETWEEN $request->fecha1 AND $request->fecha2) AND co_usuario IN ($users)");

            $result['rows'] = [];
             foreach ($relatorio as $rel) {
               $result['rows'][$rel->co_usuario][] = $rel;
            }
             foreach ($result['rows'] as $key => $value) {
                 $initial = ['liq' => 0.0, 'costo' => 0.0, 'com' => 0.0, 'lucro' => 0.0];
                 $sum = array_reduce($value, function ($res, $row) {
                      $res['liq'] += $row->recliq;
                      $res['costo'] += $row->bruto;
                      $res['com'] += $row->comision;
                      $res['lucro'] += $row->beneficio;
                    return $res;
                 }, $initial);
                  $result['totals'][$key] = $sum;
            }

            $datos=$relatorio;
            $relatorio    = array("datos");
           
             if(!empty($result['totals'])){
                $totales=$result['totals'][$key];
                $result    = array("totales");
               return view('relatorio', compact($relatorio,$result));
            }else{
                return redirect('/');
            }             
                
             
    }
   
    public function grafico(Request $request)
    {      

        $consultores= $this->consultores(); 
        $users = str_replace(['[', ']'], '', json_encode($request->users)); 
        $grafico = DB::select("SELECT (SELECT no_usuario FROM cao_usuario WHERE co_usuario=g.co_usuario) name,period,recliq FROM grafico g WHERE  co_usuario IN ($users) AND period BETWEEN $request->fecha1 AND $request->fecha2 "); 
            $result = []; 
            $name = '';
            $idx = -1;
            foreach ($grafico as $g) { 
                if ($g->name !== $name) {
                    $name = $g->name;
                    $result[++$idx] = ['type' => 'column', 'name' => $name, 'data' => array_fill(0, 12, 0.0)];
                }
                $month = (int)substr($g->period, 5);
                $result[$idx]['data'][$month - 1] += $g->recliq;
                }

            $promedio = DB::selectOne("SELECT round(IFNULL(AVG(brut_salario),0),2) avg FROM cao_salario WHERE co_usuario IN ($users)"); 

            $result[++$idx] = ['type' => 'spline', 'name' => 'Custo Fixo Médio', 'data' => array_fill(0, 12, $promedio->avg * 1.0)];
                       
             
            return view('grafico', compact(['result']));
    }

    public function pie(Request $request)
    {
        $consultores= $this->consultores();     
        $users = str_replace(['[', ']'], '', json_encode($request->users));
        $pie = DB::select("SELECT (SELECT no_usuario FROM cao_usuario WHERE co_usuario=g.co_usuario) name,sum(recliq) y FROM grafico g WHERE co_usuario IN ($users) GROUP BY co_usuario");
           return view('grafico', compact(['pie']));
    }

    public function consultores(){


         $consultores = DB::select('SELECT u.co_usuario AS usu,no_usuario FROM cao_usuario u, permissao_sistema p WHERE p.in_ativo="S"  AND u.co_usuario=p.co_usuario AND p.co_sistema=1  AND p.co_tipo_usuario IN (0,1,2) ORDER BY no_usuario');

         return $consultores;

    }

}
