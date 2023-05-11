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

		header("Location: " . $back_url . '/produtos/editar.php?id=' . $_GET['id'] . '&alerta=danger&mensagem=Informe um valor para o campo categoria.');

		exit;

	}

	if(empty($_POST['nome'])) {

		header("Location: " . $back_url . '/produtos/editar.php?id=' . $_GET['id'] . '&alerta=danger&mensagem=Informe um valor para o campo nome.');

		exit;

	}

	if(empty($_POST['preco'])) {

		header("Location: " . $back_url . '/produtos/editar.php?id=' . $_GET['id'] . '&alerta=danger&mensagem=Informe um valor para o campo preço.');

		exit;
	}

	$categoria_id = $_POST['categoria_id'];

	$nome = $_POST['nome'];

	$preco = $_POST['preco'];
	$preco = str_replace('.','', $preco);
	$preco = str_replace(',','.', $preco);
	$descricao = htmlentities($_POST['descricao']);


	if($_FILES['file']['size'] > 0) {

		$diretorio = "./../../img/uploads/produtos/";
		
		$nome_da_imagem = date('YmdHis') . '_' . md5($_FILES['file']['name']);
		
		$explode = explode('.',$_FILES['file']['name']);
		
		$nome_da_imagem = $nome_da_imagem . '.' . $explode[1];
		
		move_uploaded_file($_FILES['file']['tmp_name'], $diretorio . $nome_da_imagem);

		unlink($diretorio . $_POST['imagem']);

		$sql = "UPDATE produtos SET categoria_id = '{$categoria_id}', nome = '{$nome}', preco = '{$preco}', imagem = '{$nome_da_imagem}', descricao = '{$descricao}' WHERE id = '{$_GET['id']}'";

	} else {
		
		$sql = "UPDATE produtos SET categoria_id = '{$categoria_id}', nome = '{$nome}', preco = '{$preco}', descricao = '{$descricao}' WHERE id = '{$_GET['id']}'";

	}

	if(mysqli_query($conexao, $sql)) {

		header("Location: " . $back_url . '/produtos?alerta=success&mensagem=Registro ' . $_GET['id'] . ' atualizado com sucesso!');

	} else {

		header("Location: " . $back_url . '/produtos?alerta=danger&mensagem=Registro ' . $_GET['id'] . ' não atualizado!');

	}

}







