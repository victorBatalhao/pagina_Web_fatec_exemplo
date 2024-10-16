<?php
	require_once("verifica.php");

	$data=$_REQUEST;

	include_once("config.php");

	$conexao = db_connect();

	extract($data);
	
	if( $op != "I" )
	{
		$sql = "select id_produto, nome, descricao, marca, fornecedor, valor_compra, valor_venda, quantidade, validade
				from produto
				where id_produto = :id_produto ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', $codigo);

		$comando->execute();

		$dados = $comando->fetch(PDO::FETCH_OBJ);
	}
?>

<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center"><?php echo $lng['cadastroproduto']; ?> </h2>

	

			<div class=" row justify-content-center	bg-sucess">

	<form class="form-inline col-lg-8 col-md-8 col-sm-12" action="produtoGrava.php" method="post">
		<input type="hidden" name="id_produto" value="<?php if( $op != "I" ) { echo $dados->id_produto; } else { echo "0"; } ?>" />
		<input type="hidden" name="op" value="<?php echo $op; ?>" />
		
		<div class="form-group col-sm-12 col-lg-12">
			<div class="control-label col-sm-11">
				<p class="help-block" align="left"><h11 class="asterisco">*</h11><?php echo $lng['campoobri']; ?></p>
			</div>
		</div>
		<p>&nbsp;</p>

		<div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['nome']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="nomeProd" name="nomeProd" placeholder="nome do produto" value="<?php if( $op != "I" ) { echo $dados->nome; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>	

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['descricao']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="descProd" name="descProd" placeholder="descricao do produto" value="<?php if( $op != "I" ) { echo $dados->descricao; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['marca']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="marcaProd" name="marcaProd" placeholder="marca do produto" value="<?php if( $op != "I" ) { echo $dados->marca; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['fornecedor']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="forProd" name="forProd" placeholder="fornecedor do produto" value="<?php if( $op != "I" ) { echo $dados->fornecedor; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['valorcompra']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="vcProd" name="vcProd" placeholder="valor de compra do produto" value="<?php if( $op != "I" ) { echo $dados->valor_compra; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['valorvenda']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="vdProd" name="vdProd" placeholder="valor de venda do produto" value="<?php if( $op != "I" ) { echo $dados->valor_venda; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['quantidade']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="number" class="form-control" id="qtdeProd" name="qtdeProd" placeholder="quantidade de produto" value="<?php if( $op != "I" ) { echo $dados->quantidade; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['validade']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="date" class="form-control" id="valProd" name="valProd" placeholder="validade do produto" value="<?php if( $op != "I" ) { echo $dados->validade; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>
		
		</div>
	</div>
		<div class="col-md-12 my-4" >
			<div class="form-group col-md-11">
				<label class="col-md-5">&nbsp;</label>
				<button type="button" class="botaosair" onClick="window.open('produto.php', '_self')"><?php echo $lng['sair']; ?></button>
				<label class="col-md-1">&nbsp;</label>
				<button type="submit" class="botaocad" <?php if( $op == "C" ) echo "disabled" ?> ><?php echo $lng['salvar']; ?></button>
			</div>
		</div>
</form>

	<p>&nbsp;</p>

<?php include_once("rodape.php"); ?>
