<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Views extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE OR REPLACE VIEW `relatorio` AS SELECT s.co_usuario,DATE_FORMAT(f.data_emissao,"%Y-%m") period,sum(f.valor-(f.valor*total_imp_inc/100)) recliq,IFNULL((select brut_salario from cao_salario where co_usuario=s.co_usuario),0) bruto,sum((valor-(valor*total_imp_inc/100))*(comissao_cn/100)) comision FROM cao_fatura f INNER JOIN cao_os s ON f.co_os=s.co_os WHERE 1 GROUP BY s.co_usuario,period');

        DB::unprepared('CREATE OR REPLACE VIEW `grafico` AS SELECT s.co_usuario,DATE_FORMAT(f.data_emissao,'%Y-%m') period,round(sum(f.valor-(f.valor*total_imp_inc/100)),2) recliq FROM cao_fatura f INNER JOIN cao_os s ON f.co_os=s.co_os WHERE 1 GROUP BY s.co_usuario,period');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW IF EXISTS `relatorio`');
        DB::unprepared('DROP VIEW IF EXISTS `grafico`');
        
    }
}
