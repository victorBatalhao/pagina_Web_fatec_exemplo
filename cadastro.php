<?php include_once("cabec.php"); ?>

<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['cadastrar']; ?></h2>

	<form action="salvarPessoa.php" method="post" class="form card-body row border-dark justify-content-center">
		<div class="col-lg-8 col-sm-12">

        <div class="row g-3 align-items-center">
				<div class="col-lg-3 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtNome" class="col-form-label corTextoInverso"><?php echo $lng['nome']; ?></label>
				</div>
				<div class="col-lg-5 col-sm-12">
					<input type="text" id="edtNome" name="edtNome" size="80" class="form-control" aria-describedby="textoHelpNome">
				</div>
			</div>

            <p>&nbsp;</p>

			<div class="row g-3 align-items-center">
				<div class="col-lg-3 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtMail" class="col-form-label corTextoInverso"><?php echo $lng['email']; ?></label>
				</div>
				<div class="col-lg-5 col-sm-12">
					<input type="email" id="edtMail" name="edtMail" size="80" class="form-control" aria-describedby="textoHelpEmail">
				</div>
			</div>
			
			<p>&nbsp;</p>
			
			<div class="row g-3 align-items-center">
				<div class="col-lg-3 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtSenha" class="col-form-label corTextoInverso"><?php echo $lng['senha']; ?></label>
				</div>
				<div class="col-lg-5 col-sm-12">
					<input type="password" id="edtSenha" name="edtSenha" size="80" class="form-control" aria-describedby="textoHelpSenha">
				</div>
			</div>
			
			<p>&nbsp;</p>

			<div class="row g-3 align-items-center">
				<div class="col-lg-3 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtSenha" class="col-form-label corTextoInverso"><?php echo $lng['tipo']; ?></label>
				</div>
				<div class="col-auto">
                <select required="" id="edtTipo" name="edtTipo" class="form-control col-md-8">
                        <option value="M">Master</option>
						<option value="A">Admin</option>
						<option value="O">Operador</option>
                    	<option value="F">Funcionario</option>
                    	<option value="R">Fornecedor</option>
                    	<option value="C">Cliente</option>
                </select>
            </div>
        	</div>

			<p>&nbsp;</p>

			<div class="row g-3 justify-content-center">
				<button type="submit" class="btn btn-lg cor_barra cor_texto_barra btn-block col-lg-3"><?php echo $lng['cadastrousuario']; ?></button>	
			</div>
			
		</div>
	</form>

	<p>&nbsp;</p>

<?php include_once("rodape.php"); ?>