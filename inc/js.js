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
	if($('#search').val() != ""){
		$( "#linhasalas td" ).css( "background-color", "white" );
		$( "td:contains("+$('#search').val()+")" ).css( "background-color", "red" );
		$( "#contador" ).load( "scripts/contador.php", {a:1} );
	}
}
/* ao pressionar ENTER irá fazer a busca */
$(document).keypress(function(e) {
	if(e.which == 13) {
		buscar();
	}
});
$(document).ready(function(e) {
	$( "#contador" ).load( "scripts/contador.php" );
});

function alteraHorario(id,campo,descricao){
	$("#descricaohorario").val(descricao);
	$("#idsala").val(id);
	$("#campo").val(campo);
}

function salvaHorario(){
	var descricao = $("#descricaohorario").val();
	var id = $("#idsala").val();
	var campo = $("#campo").val();
	$( "#contador" ).load( "scripts/salvahorario.php", {a:1, id:id, campo:campo, descricao:descricao} );
	$( "#contador" ).load( "scripts/contador.php");
	window.location.reload(true);
}

function acesso(){
	var senha = $("#senha").val();
	if(senha == "capsosorio"){
		$("#form1").hide();
		$("#form2").show();
	}else{
		alert("Senha errada.");
	}
}

function cancela(){
	$("#senha").val("");
        $("#form2").hide();
        $("#form1").show();
}
