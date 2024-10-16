<?php
	$data=$_REQUEST;

	extract($data);

	$cep = preg_replace("/[^0-9]/", "", $cep);
	
	$url = "viacep.com.br/ws/" . $cep . "/json/";


	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);

	$headers = array(
	  'Authorization: BT',
	  'Accept: application/json'
	);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	
	$dados = json_decode( $response, true );
	
	echo '{"cep":"' . $dados['cep'] . '"';
	echo ',"logradouro":"' . $dados['logradouro'] . '"';
	echo ',"complemento":"' . $dados['complemento'] . '"';
	echo ',"bairro":"' . $dados['bairro'] . '"';
	echo ',"localidade":"' . $dados['localidade'] . '"';
	echo ',"uf":"' . $dados['uf'] . '"';
	echo ',"ibge":"' . $dados['ibge'] . '"';
	echo '}';
	
?>