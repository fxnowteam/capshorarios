<?
/** 
  * Script para pesquisar nomes de profissionais ou grupos em um CAPS
  * Imbé, Rio Grande do Sul, Brasil
  * Tiago Floriano <https://github.com/paico>
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
  
$conecta = mysql_connect("localhost","root","") or die(mysql_error());
$seldb = mysql_select_db("caps") or die(mysql_error());
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="ISO-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Hor&aacute;rios CAPS</title>
		
		<script src="inc/jquery.js"></script>
		<script src="inc/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="inc/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="inc/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="inc/css.css">
	</head>
	<body>
		<div class="col-md-12" id="busca">
				<input id="search" type="text" class="form-control" placeholder="Digite o termo e clique ENTER">
		</div>
		<div style="clear: both"></div>
		<div class="col-md-12">
		  <table class="table table-striped">
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
			<td><?= $r["nomesala"] ?></td>
			<td><?= $r["segmanha"] ?></td>
			<td><?= $r["segtarde"] ?></td>
			<td><?= $r["termanha"] ?></td>
			<td><?= $r["tertarde"] ?></td>
			<td><?= $r["quamanha"] ?></td>
			<td><?= $r["quatarde"] ?></td>
			<td><?= $r["quimanha"] ?></td>
			<td><?= $r["quitarde"] ?></td>
			<td><?= $r["sexmanha"] ?></td>
			<td><?= $r["sextarde"] ?></td>
		      </tr>
		    </tbody>
		    <?
		    }
		    ?>
		  </table>
		</div>
		</div>
		 
		<script type="text/javascript">
			/* trecho retirado de http://stackoverflow.com/questions/14628989/make-jquery-contains-accent-insensitive 
			modifica a função do jquery contains para ser case-insensitive e accents-insensitive
			*/
			jQuery.expr[':'].contains = function(a, i, m) {
			    var rExps=[
				{re: /[\xC0-\xC6]/g, ch: "A"},
				{re: /[\xE0-\xE6]/g, ch: "a"},
				{re: /[\xC8-\xCB]/g, ch: "E"},
				{re: /[\xE8-\xEB]/g, ch: "e"},
				{re: /[\xCC-\xCF]/g, ch: "I"},
				{re: /[\xEC-\xEF]/g, ch: "i"},
				{re: /[\xD2-\xD6]/g, ch: "O"},
				{re: /[\xF2-\xF6]/g, ch: "o"},
				{re: /[\xD9-\xDC]/g, ch: "U"},
				{re: /[\xF9-\xFC]/g, ch: "u"},
				{re: /[\xC7-\xE7]/g, ch: "c"},
				{re: /[\xD1]/g, ch: "N"},
				{re: /[\xF1]/g, ch: "n"}
			    ];

			    var element = $(a).text();
			    var search = m[3];

			    $.each(rExps, function() {
				element = element.replace(this.re, this.ch);
				search = search.replace(this.re, this.ch);
			    });

			    return element.toUpperCase()
			    .indexOf(search.toUpperCase()) >= 0;
			};
			/* fim do trecho retirado do stackoverflow */
			function buscar(){
				$( "td" ).css( "background-color", "white" );
				$( "td:contains("+$('#search').val()+")" ).css( "background-color", "red" );
			}
			/* ao pressionar ENTER irá fazer a busca */
			$(document).keypress(function(e) {
    				if(e.which == 13) {
    					buscar();
    				}
    			});
		</script>
	 
	</body>
</html>
<?
mysql_close($conecta);
