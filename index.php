<?
/** 
  * Script para pesquisar nomes de profissionais ou grupos em um CAPS
  * Imbé, Rio Grande do Sul, Brasil
  * Tiago Floriano <https://github.com/paico/capshorarios>
  *
  * Este programa e software livre; voce pode redistribui-lo e/ou
  * modifica-lo sob os termos da Licenca Publica Geral GNU, conforme
  * publicada pela Free Software Foundation; tanto a versao 2 da
  * Licenca como (a seu criterio) qualquer versao mais nova.  
  *
  * Este programa e distribuido na expectativa de ser util, mas SEM
  * QUALQUER GARANTIA; sem mesmo a garantia implicita de
  * COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM
  * PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais
  * detalhes.
  *
  * Voce deve ter recebido uma copia da Licenca Publica Geral GNU
  * junto com este programa; se nao, escreva para a Free Software
  * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
  * 02111-1307, USA.
  *
  * Copia da licenca no diretorio licenca/licenca_en.txt
  * licenca/licenca_pt.txt
  */
  
$conecta = mysql_connect("localhost","Vtz4cjrq5v","Y[_3^DuT7#") or die(mysql_error());
$seldb = mysql_select_db("caps") or die(mysql_error());

function exibe($texto){
    
    /*
     * Esta função captura o texto do banco de dados, localiza uma data e acrescenta 14 dias nela, até que esta data seja superior a data do dia.
     * Ela foi criada porque neste CAPS alguns atendimentos são quinzenais, e para que não seja preciso uma atualização manual a cada 15 dias,
     * esta função exibe automaticamente a próxima data.
     * Para que funcione, o texto precisa estar no seguinte formato:
     * >>>dd/mm/YYYY
     * Note a presença de 3 caracteres ">" antes da data, e sem espaço entre este caracter e a data. Isto evita que se crie um novo campo no banco de dados.
     * Se houver mais de uma data, elas devem estar entre parenteses:
     * Fulano (quinzenal >>>dd/mm/YYYY) e Ciclano (quinzenal >>>dd/mm/YYYY)
     */
    
    $trata = explode(">>>",$texto); //delimitador que informa ao sistema que após aquele ponto há uma data
    $num = count($trata); //conta quantas datas. Normal = 2
    if($trata[1] != ""){ //se houver algo aqui, é porque realmente havia uma data
        $contador = 0; // controla o while
        //captura as datas
        while(($contador + 1) <= $num){
            //particiona a data que está no formato dd/mm/YYYY
            $pegadata = explode("/",$trata[$contador+1]);
            $pegadia = $pegadata[0];
            $pegames = $pegadata[1];
            $pegaano = explode(")",$pegadata[2]);
            $pegaano = $pegaano[0];
            
            //organiza a data no formato americano
            $data = date("Y")."-$pegames-$pegadia";
            //adiciona 14 dias
            $novadata = date("Y-m-d",strtotime("+14 days",strtotime($data)));
            //verifica se aqueles 14 dias são superiores ao dia de hoje, se não são, acrescenta mais 14 dias até que seja suficiente
            if($novadata < date("Y-m-d")){
                $novadata = date("Y-m-d",strtotime("+14 days",strtotime($novadata)));
            }
            //a partir da soma anterior, cria mais uma data com mais 14 dias, para ampliar a informação
            $novadata2 = date("Y-m-d",strtotime("+14 days",strtotime($novadata)));
            
            //trata novamente a data, transformando-a no formato dd/mm
            $data1 = explode("-",$novadata);
            $data1 = $data1[2]."/".$data1[1];
            $data2 = explode("-",$novadata2);
            $data2 = $data2[2]."/".$data2[1];
            
            //substitui a data que está no texto do banco de dados
            $texto = str_replace("$pegadia/$pegames/$pegaano"," $data1 - $data2",$texto);
            
            //atualiza a variável $trata, usada no início desta função com o texto extraido direto do banco. Agora ela será usada, se houver mais datas para atualizar, com o texto atualizado
            $trata = explode(">>>",$texto);
            //soma o contador para refazer o loop até que não haja mais datas para atualizar
            $contador++;
        }
    }
    return $texto;
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="img/ico.png" />
		<title>Hor&aacute;rios CAPS</title>
		
		<script src="inc/jquery.js"></script>
		<script src="inc/bootstrap.js"></script>
		<script src="inc/js.js"></script>
		<link rel="stylesheet" type="text/css" href="inc/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="inc/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="inc/css.css">
	</head>
	<body>
		<div class="col-md-1" id="logo">
			<img src="img/logo.jpg">
		</div>
		<div class="col-md-11" id="busca">
			<input id="search" type="text" class="form-control" placeholder="Digite o termo e clique ENTER">
		</div>
		<div style="clear: both"></div>
		<div class="col-md-12">
		  <table class="table table-striped table-hover">
		    <thead>
		      <tr id="cab1">
			<th style="border-right: solid 1px #ccc;"></th>
			<th colspan="2" style="border-right: solid 1px #ccc;">SEGUNDA</th>
			<th colspan="2" style="border-right: solid 1px #ccc;">TER&Ccedil;A</th>
			<th colspan="2" style="border-right: solid 1px #ccc;">QUARTA</th>
			<th colspan="2" style="border-right: solid 1px #ccc;">QUINTA</th>
			<th colspan="2">SEXTA</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr id="cab2">
			<td style="width: 3%"></td>
			<td style="width: 9%">Manh&atilde;</td>
			<td style="width: 10%">Tarde</td>
			<td style="width: 9%">Manh&atilde;</td>
			<td style="width: 10%">Tarde</td>
			<td style="width: 9%">Manh&atilde;</td>
			<td style="width: 10%">Tarde</td>
			<td style="width: 9%">Manh&atilde;</td>
			<td style="width: 10%">Tarde</td>
			<td style="width: 9%">Manh&atilde;</td>
			<td style="width: 10%">Tarde</td>
		      </tr>
		    </tbody>
		    <?
		    // lista salas e horários de acordo com o cadastrado no banco
		    $sel = mysql_query("SELECT * FROM salas ORDER BY id ASC") or die(mysql_error());
		    while($r = mysql_fetch_array($sel)){
		    ?>
		    <tbody>
		      <tr id="linhasalas">
			<td class="warning"><?= $r["nomesala"] ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','segmanha','<?= str_replace("<br>","",$r["segmanha"]) ?>')"><?= exibe($r["segmanha"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','segtarde','<?= str_replace("<br>","",$r["segtarde"]) ?>')"><?= exibe($r["segtarde"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','termanha','<?= str_replace("<br>","",$r["termanha"]) ?>')"><?= exibe($r["termanha"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','tertarde','<?= str_replace("<br>","",$r["tertarde"]) ?>')"><?= exibe($r["tertarde"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','quamanha','<?= str_replace("<br>","",$r["quamanha"]) ?>')"><?= exibe($r["quamanha"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','quatarde','<?= str_replace("<br>","",$r["quatarde"]) ?>')"><?= exibe($r["quatarde"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','quimanha','<?= str_replace("<br>","",$r["quimanha"]) ?>')"><?= exibe($r["quimanha"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','quitarde','<?= str_replace("<br>","",$r["quitarde"]) ?>')"><?= exibe($r["quitarde"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','sexmanha','<?= str_replace("<br>","",$r["sexmanha"]) ?>')"><?= exibe($r["sexmanha"]) ?></td>
			<td class="warning" id="modal-634306" href="#modal-container-634306" role="button" data-toggle="modal" onclick="alteraHorario('<?= $r["id"] ?>','sextarde','<?= str_replace("<br>","",$r["sextarde"]) ?>')"><?= exibe($r["sextarde"]) ?></td>
		      </tr>
		    </tbody>
		    <?
		    }
		    ?>
		  </table>
		</div>
		</div>
		 
			<div class="modal fade" id="modal-container-634306" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								x
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Alterar hor&aacute;rio
							</h4>
						</div>
						<div class="modal-body" id="form1">
							<div class="form-group">
								<input type="password" class="form-control" id="senha" placehold="Informe a senha">
								<button type="button" class="btn btn-primary" onclick="acesso()">Acessar</button>
							</div>
						</div>
						<div class="modal-body" id="form2" style="display: none">
							<div class="form-group">
								<textarea class="form-control" id="descricaohorario"></textarea>
								<input type="hidden" id="idsala" value="">
								<input type="hidden" id="campo" value="">
							</div>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancela()">
								Cancelar
							</button> 
							<button type="button" class="btn btn-primary" onclick="salvaHorario()" id="form2">
								Salvar
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="imprimir">
				<button type="button" class="btn btn-primary" onclick="window.print();" id="form3">
					Imprimir
				</button>
			</div>

	 	<div id="contador"></div>
	</body>
</html>
<?
mysql_close($conecta);
