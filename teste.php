<?php
	$key = "PortalZ";

    $data=$_REQUEST;

    extract($data);

	$senha = base64_encode($edtSenha . '::' . $key);

	echo $senha;
?>