<?php
	require_once("verifica.php");
	require_once("cabec.php");
	

	$data=$_REQUEST;

	include_once("config.php");

	$conexao = db_connect();

	extract($data);
	
	if( $op = "I" )
	{
		$sql = "select usuCodigo, usuMail, usuSenha, usuNome, usuStatus, usutipo
				from usuario
				where usuCodigo = :codigo ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', $codigo);

		$comando->execute();

		$dados = $comando->fetch(PDO::FETCH_OBJ);
	}
?>

	<p>&nbsp;</p>

	<h2 align="center"><?php echo $lng['sobresistema']; ?></h2>

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<h3 align="center"><?php echo $lng['essesistema']; ?></h3>

	<p>&nbsp;</p>

	<h3 align="center"><?php echo $lng['contatomv']; ?></h3>

<?php
	include_once("rodape.php");
?>