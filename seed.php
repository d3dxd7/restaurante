<?php

include('admin/config.php');

$conexao = mysqli_connect($db_servername,$db_username,$db_password,$db_name);

function gerarNomeAleatorio() {

	$letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$nome = '';

	for ($i = 0; $i < 4; $i++) {

		$letra = $letras[rand(0, strlen($letras) - 1)];

		$nome .= $letra;

	}

	return $nome;

}

for($i = 1; $i <= 50; $i++) {

	$nome = gerarNomeAleatorio();

	$preco = 1.2 * $i;
	
	$imagem = $nome . '.jpg';
	
	$sql = "
	INSERT INTO produtos
	(categoria_id,nome, preco, imagem) 
	VALUES
	('1','{$nome}','{$preco}','{$imagem}')
	";
	
	echo $sql . '<br>';
	
	mysqli_query($conexao, $sql);

}