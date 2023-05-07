<?php

include('../config.php');

session_start();

if(!isset($_SESSION['email'])) {

	header("Location: " . $back_url);

}

$conexao = mysqli_connect(
	$db_servername,
	$db_username,
	$db_password,
	$db_name
);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(empty($_POST['categoria_id'])) {

		header("Location: " . $back_url . '/produtos/novo.php?alerta=danger&mensagem=Informe um valor para o campo categoria.');

		exit;

	}

	if(empty($_POST['nome'])) {

		header("Location: " . $back_url . '/produtos/novo.php?alerta=danger&mensagem=Informe um valor para o campo nome.');

		exit;

	}

	if(empty($_POST['preco'])) {

		header("Location: " . $back_url . '/produtos/novo.php?alerta=danger&mensagem=Informe um valor para o campo preço.');

		exit;
	}

	if($_FILES['file']['size'] == 0){

		header("Location: " . $back_url . '/produtos/novo.php?alerta=danger&mensagem=Informe um valor para o campo imagem.');

		exit;

	}

	$nome = $_POST['nome'];

	$preco = $_POST['preco'];

	$preco = str_replace('.','',$preco); //Transforma String e substitui . por '' vazio
	$preco = str_replace(',','.',$preco); //Troca onde for , por . para reconhecer na base

	$categoria_id = $_POST['categoria_id'];

	$diretorio = "./../../img/uploads/produtos/";

	$nome_da_imagem = date('YmdHis') . '_' . md5($_FILES['file']['name']);

	$explode = explode('.',$_FILES['file']['name']);

	$nome_da_imagem = $nome_da_imagem . '.' . $explode[1];

	move_uploaded_file($_FILES['file']['tmp_name'], $diretorio . $nome_da_imagem);

	$sql = "insert into produtos (categoria_id, nome,preco,imagem) values ('{$categoria_id}','{$nome}','{$preco}','{$nome_da_imagem}')";

	mysqli_query($conexao,$sql);

	header("Location: " . $back_url . '/produtos/index.php');

}
