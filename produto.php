<?php
	require_once("verifica.php");

	include_once("cabec.php");
	
	include_once("config.php");

    $conexao = db_connect();

	$sql = "select produto.id_produto, produto.nomeProd, produto.descProd, produto.marcaProd, produto.forProd,
			produto.vcProd, produto.vdProd, produto.qtdeProd, produto.valProd
			from produto 
			order by produto.nomeProd ";

	$comando = $conexao->prepare($sql);

	$comando->execute();
			
	$dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

	<p>&nbsp;</p>

	<h2 align="center" class="text-dark"><?php echo $lng['cadastroproduto']; ?></h2>

	<p>&nbsp;</p>

	<div class="row col-lg-12 justify-content-end">
		
		<form id="formNovo" name="formNovo" action="produtoCad.php" method="post" class="form col-lg-3 col-sm-10">
			<input type="hidden" name="op" value="I" />
			<input type="hidden" name="codigo" value="0" />

			
		
		<div class="col-lg-2 col-sm-12">&nbsp;</div>
	</div>

	<div class="container">
		<table id="dados" class="table table-bordered table-hover col-lg-10 col-sm-12" align="center" border=1>
			<thead class="bg-dark">
				<tr>
					<th class="text-center text-white"><?php echo $lng['codigo']; ?></th>
					<th class="text-center text-white"><?php echo $lng['nome']; ?></th>
					<th class="text-center text-white"><?php echo $lng['descricao']; ?></th>
					<th class="text-center text-white"><?php echo $lng['marca']; ?></th>
					<th class="text-center text-white"><?php echo $lng['fornecedor']; ?></th>
					<th class="text-center text-white"><?php echo $lng['valorcompra']; ?></th>
					<th class="text-center text-white"><?php echo $lng['valorvenda']; ?></th>
					<th class="text-center text-white"><?php echo $lng['quantidade']; ?></th>
					<th class="text-center text-white"><?php echo $lng['validade']; ?></th>
					<th class="text-center text-white"><?php echo $lng['opcoes']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach( $dados as $linha )
					{				
				?>
				<tr>
					<td align="center"><?php echo htmlspecialchars($linha->id_produto); ?></td>
					<td><?php echo htmlspecialchars($linha->nomeprod); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->descprod); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->marcaprod ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->forprod ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->vcprod ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->vdprod ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->qtdeprod ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->valprod ); ?></td>
					
					<td>
						<div class="row col-lg-12 justify-content-center">
							<form id="<?php echo 'formVer' . $linha->id_produto; ?>" name="<?php echo 'formVer' . $linha->id_produto; ?>" action="produtoCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="C" />
								<input type="hidden" name="codigo" value="<?php echo $linha->id_produto; ?>" />

								<a title=<?php echo $lng['visualizar']; ?>  href="javascript:void(0);" onClick="<?php echo 'formVer' . $linha->id_produto; ?>.submit();" >
									<i class="bi-display" style="font-size: 1.5rem; color: black;"></i>
								</a>
							</form>
							
							&nbsp;&nbsp;&nbsp;
							<form id="<?php echo 'formAlt' . $linha->id_produto; ?>" name="<?php echo 'formAlt' . $linha->id_produto; ?>" action="produtoCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="A" />
								<input type="hidden" name="codigo" value="<?php echo $linha->id_produto; ?>" />

								<a title=<?php echo $lng['alterar']; ?>  href="javascript:void(0);" onClick="<?php echo 'formAlt' . $linha->id_produto; ?>.submit();" >
									<i class="bi-pencil" style="font-size: 1.5rem; color: black;"></i>
								</a>
							</form> 
						
						</div>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<button type="button" class="botaocad" onClick="formNovo.submit();"><?php echo $lng['novcadastro']; ?></button>
		</form>
		<br><br><br><br><br><br>
	</div>

	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
	<script>
		idioma = "<?php echo $_COOKIE['idioma']; ?>";
		idioma = idioma.replace('_', '-');
		
		$(document).ready(function () {
			$('#dados').DataTable({
				language: {
					url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/' + idioma.trim() + '.json',
					decimal: ',',
            		thousands: '.',
				},
			});
		});
		
	</script>

<?php
	include_once("rodape.php");
?>