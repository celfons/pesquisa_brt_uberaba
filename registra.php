<?php

		$nome = $_POST['nome'];
        $data = $_POST['data'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];


	$mysqli=mysqli_connect("mysql.hostinger.com.br","u561856790_root","EIqX18PrPq","u561856790_all");

	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$stmt = mysqli_prepare($mysqli,"INSERT INTO sistema(nome,data,telefone,endereco) VALUES (?, ?, ?, ?)");
	
	if ($stmt === false) {
		trigger_error('Statement failed! ' . htmlspecialchars(mysqli_error($mysqli)), E_USER_ERROR);
	}

	$bind = mysqli_stmt_bind_param($stmt, "ssis", $nome , $data, $telefone,$endereco);
	
	if ($bind === false) {
		trigger_error('Bind param failed!', E_USER_ERROR);
	}

	$exec = mysqli_stmt_execute($stmt);
	
	if ($exec === false) {
		trigger_error('Statement execute failed! ' . htmlspecialchars(mysqli_stmt_error($stmt)), E_USER_ERROR);	
	}
	mysqli_stmt_close($stmt);

	mysqli_close($mysqli);
	
	header("Location: index.php");