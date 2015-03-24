<?php
$dbnome="blogva";
$usuario="root";
$password="root";

if(!($login = @mysql_connect("localhost", $usuario,$password))){
	echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor contactar o Administrador";
	exit;
}
if(!($con=@mysql_select_db($dbnome, $login))){
	echo "Não foi po estabelecer uma conexão com o gerenciador MySQL. Favor contactar o Administrador";
	exit();
}