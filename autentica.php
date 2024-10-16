<?php
	$key = "PortalZ";

    $data=$_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	$email = $edtMail;
	$senha = base64_encode($edtSenha . '::' . $key);
	$status = "A";

	$resultado = "ERRO";
	
	$sql = "select usuCodigo, usuNome, usuTipo from usuario where usuMail = :mail and usuSenha = :senha and usuStatus = :status ";

    $comando = $conexao->prepare($sql);

    $comando->bindParam(':mail', $email);
	$comando->bindParam(':senha', $senha);
	$comando->bindParam(':status', $status);

    $comando->execute();

	if( $comando->rowCount() > 0)
	{
		$dados = $comando->fetch(PDO::FETCH_OBJ);
		
		$usuCodigo  = $dados->usucodigo;
		$usuNome 	= $dados->usunome;
		$usuTipo 	= $dados->usutipo;
		
		
		session_start();
		
		$_SESSION['logged_in'] = true;
		$_SESSION['usuCodigo'] = $usuCodigo;
		$_SESSION['usuNome']   = $usuNome;
		$_SESSION['usuTipo']   = $usuTipo;
		$_SESSION['TEMPO'] = time();
		
		header('location: .');
	}
	else
	{
		header('location: login_invalido.php');
	}
?>