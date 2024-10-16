<?php
	require_once("verifica.php");

	include_once("cabec.php");
	
	include_once("config.php");

    $conexao = db_connect();

	$sql = "select usuario.usuCodigo, usuario.usuMail, usuario.usuNome, usuario.usuStatus, usuario.usuTipo
			from usuario 
			order by usuario.usuNome ";

	$comando = $conexao->prepare($sql);

	$comando->execute();
			
	$dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['selecioneIdioma']; ?></h2>

	<p>&nbsp;</p>

	<div class="container">
		<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['portugues']; ?></p>
						
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=pt_BR"><img src="./icones/pt_Br.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">pt_BR</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['ingles']; ?></p>
						
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=en_US"><img src="./icones/en_Us.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">en_US</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es_ES"><img src="./icones/es_Es.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es_ES</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['frances']; ?></p>
						
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=fr_FR"><img src="./icones/fr_Fr.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">fr_FR</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['italiano']; ?></p>
						
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=it_IT"><img src="./icones/it_It.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">it_IT</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card">
					
						<div class="card-header border-dark corTsextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['alemao']; ?></p>
						</div>

						<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=de_DE"><img src="./icones/de_De.png" width="100px"></a></p>
						</div>

					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">de_DE</small>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>