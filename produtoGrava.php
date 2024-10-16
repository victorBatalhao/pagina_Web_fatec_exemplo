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
		$sql = "update produto set nomeProd = :nome, marcaProd = :marca,
				descProd = :descricao, forProd = :fornecedor, vcProd = :valor_compra,
				vdProd = :valor_venda, qtdeProd = :quantidade, valProd = :validade
				

				where id_produto = :id_produto ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':id_produto', 		$id_produto);
		$comando->bindParam(':nome', 		$nomeProd);
		$comando->bindParam(':marca', 		$marcaProd);
		$comando->bindParam(':descricao', 		$descProd);
		$comando->bindParam(':fornecedor', 		$forProd);

		$comando->bindParam(':valor_compra', 		$vcProd);
		$comando->bindParam(':valor_venda', 		$vdProd);
		$comando->bindParam(':quantidade', 		$qtdeProd);
		$comando->bindParam(':validade', 		$valProd);


		$comando->execute();
	}
	else
	{
		$sql = "insert into produto ( nomeProd, marcaProd, descProd, forProd, vcProd, vdProd, qtdeProd, valProd)
				values( :nome, :marca, :descricao, :fornecedor, :valor_compra, :valor_venda, :quantidade, :validade ) ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':id_produto', 		$id_produto);
		$comando->bindParam(':nome', 		$nomeProd);
		$comando->bindParam(':marca', 		$marcaProd);
		$comando->bindParam(':descricao', 		$descProd);
		$comando->bindParam(':fornecedor', 		$forProd);

		$comando->bindParam(':valor_compra', 		$vcProd);
		$comando->bindParam(':valor_venda', 		$vdProd);
		$comando->bindParam(':quantidade', 		$qtdeProd);
		$comando->bindParam(':validade', 		$valProd);

		$comando->execute();
	}

	header('location: produto.php');
?>