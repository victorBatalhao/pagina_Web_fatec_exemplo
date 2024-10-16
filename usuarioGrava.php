<?php
	include_once("verifica.php");

	$key = "PortalZ";

    $data = $_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	$senha = base64_encode($edtSenha . '::' . $key);
	
	$resultado = "ERRO";	
	
	if( $op == "A")
	{
		$sql = "update usuario set usuMail = :mail, usuNome = :nome,
				usuStatus = :status, usuTipo = :tipo, usuCep = :cep,
				usuRua = :rua, usuBairro = :bairro, usuCidade = :cidade,
				usuEstado = :estado, usuIbge = :ibge

				where usuCodigo = :codigo ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', 		$edtCodigo);
		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);

		$comando->bindParam(':cep', 		$edtCep);
		$comando->bindParam(':rua', 		$edtRua);
		$comando->bindParam(':bairro', 		$edtBairro);
		$comando->bindParam(':cidade', 		$edtCidade);
		$comando->bindParam(':estado', 		$edtEstado);
		$comando->bindParam(':ibge', 		$edtIbge);

		$comando->execute();
	}
	else
	{
		$sql = "insert into usuario ( usuMail, usuSenha, usuNome, usuStatus, usuTipo, usuCep, usurua, usubairro, usucidade, usuestado, usuibge )
				values( :mail, :senha, :nome, :status, :tipo, :cep, :rua, :bairro, :cidade, :estado, :ibge ) ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':senha', 		$senha);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);

		$comando->bindParam(':cep', 		$edtCep);
		$comando->bindParam(':rua', 		$edtRua);
		$comando->bindParam(':bairro', 		$edtBairro);
		$comando->bindParam(':cidade', 		$edtCidade);
		$comando->bindParam(':estado', 		$edtEstado);
		$comando->bindParam(':ibge', 		$edtIbge);

		$comando->execute();
	}

	header('location: usuario.php');
?>