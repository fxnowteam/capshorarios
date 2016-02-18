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
  
$conecta = mysql_connect("localhost","root","") or die(mysql_error());
$seldb = mysql_select_db("caps") or die(mysql_error());

if($_POST["a"] == 1){
	$ins = mysql_query("UPDATE contador SET contador=contador+1") or die(mysql_error());
}

$sel = mysql_query("SELECT * FROM contador") or die(mysql_error());
$r = mysql_fetch_array($sel);
echo "<small>Foram realizadas {$r["contador"]} pesquisas.";

mysql_close($conecta);
