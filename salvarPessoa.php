<?php
	$key = "PortalZ";

    $data=$_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	
    $nome = $edtNome;
    $email = $edtMail;
	$senha = base64_encode($edtSenha . '::' . $key);
	$status = "A";
    $tipo = $edtTipo;

    $cep = $edtCep;
    $rua = $edtRua;
    $bairro = $edtBairro;
    $cidade = $edtCidade;
    $estado = $edtEstado;
    $ibge = $edtIbge;
	//$senha = $edtSenha;

	$resultado = "ERRO";
	
	$sql = "INSERT INTO usuario (usumail, ususenha, usunome, usustatus, usutipo, usucep, usurua, usubairro, usucidade, usuestado, usuibge) 
    VALUES ('$email', '$senha', '$nome', '$status', '$tipo','$cep','$rua','$bairro','$cidade','$estado','$ibge')";

    $comando = $conexao->prepare($sql);


    $comando->execute();

    header('location: .');
?>