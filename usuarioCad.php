<?php
	require_once("verifica.php");

	$data=$_REQUEST;

	include_once("config.php");

	$conexao = db_connect();

	extract($data);
	
	if( $op != "I" )
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

<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center"><?php echo $lng['dadosusuario']; ?> </h2>

	

			<div class=" row justify-content-center	bg-sucess">

	<form class="form-inline col-lg-8 col-md-8 col-sm-12" action="usuarioGrava.php" method="post">
		<input type="hidden" name="edtCodigo" value="<?php if( $op != "I" ) { echo $dados->usuCodigo; } else { echo "0"; } ?>" />
		<input type="hidden" name="op" value="<?php echo $op; ?>" />
		
		<div class="form-group col-sm-12 col-lg-12">
			<div class="control-label col-sm-11">
				<p class="help-block" align="left"><h11 class="asterisco">*</h11><?php echo $lng['campoobri']; ?></p>
			</div>
		</div>
		<p>&nbsp;</p>

		

		<div class="form-group row my-2">
			<label for="edtMail" class=" col-form-label"><?php echo $lng['email']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtMail" name="edtMail" placeholder="e-mail do usuário" value="<?php if( $op != "I" ) { echo $dados->usumail; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>	
		
		<div class="form-group row my-2">
			<label for="edtSenha" class=" col-form-label"><?php echo $lng['senha']; ?><h11 class="asterisco">*</h11></label>
			<div >
				<input type="password" class="form-control" id="edtSenha" name="edtSenha" placeholder="Senha do Usuário" value="<?php if( $op != "I" ) { echo '********'; } ?>" <?php if( $op != "I" ) echo "readonly" ?>>
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtNome" class="col-form-label"><?php echo $lng['nomeusuario']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtNome" name="edtNome" placeholder="Nome do Usuário" value="<?php if( $op != "I" ) { echo $dados->usunome; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label class="col-sm-2 col-form-label text-end"><?php echo $lng['datacad']; ?></label>
			<label class="col-sm-7 col-form-label text-start"><?php if( $op != "I" ) { echo $dados->usudatecad; } else { echo '---'; } ?></label>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtStatus" class="col-sm-2 col-form-label text-end"><?php echo $lng['status']; ?> <h11 class="asterisco">*</h11></label>
			<div class="col-sm-4">
				<select required="" id="edtStatus" name="edtStatus" class="form-control col-md-8" <?php if( $op == "C" ) echo "disabled" ?> >
					<option value="A" <?php if( $op != "I" && $dados->usustatus == "A" ) { echo "selected"; } ?>>Ativo</option>
					<option value="I" <?php if( $op != "I" && $dados->usustatus == "I" ) { echo "selected"; } ?>>Inativo</option>
				</select>
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtTipo" class="col-sm-2 col-form-label text-end"><?php echo $lng['tipousuario']; ?> <h11 class="asterisco">*</h11></label>
			<div class="col-sm-4">
				<select required="" id="edtTipo" name="edtTipo" class="form-control col-md-8" <?php if( $op == "C" ) echo "disabled" ?> >
					<option value="M" <?php if( $op != "I" && $dados->usutipo == "M" ) { echo "selected"; } ?>>Master</option>
					<option value="A" <?php if( $op != "I" && $dados->usutipo == "A" ) { echo "selected"; } ?>>Admin</option>
					<option value="O" <?php if( $op != "I" && $dados->usutipo == "O" ) { echo "selected"; } ?>>Operador</option>
				</select>
			</div>
	  	</div>
		
		  <p>&nbsp;</p>
		  <h3 align="center"><?php echo $lng['enderecouser']; ?> </h3>
		  <p>&nbsp;</p>

		<div class="form-group row my-2">
			<label for="edtNome" class="col-form-label"><?php echo $lng['cep']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtCep" name="edtCep" placeholder="CEP da residência" value="<?php if( $op != "I" ) { echo $dados->usucep; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>

		<div class="form-group row my-2">
		  <label for="edtNome" class="col-form-label"><?php echo $lng['rua']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtRua" name="edtRua" placeholder="Rua da residência" value="<?php if( $op != "I" ) { echo $dados->usurua; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>

		<div class="form-group row my-2">
		  <label for="edtNome" class="col-form-label"><?php echo $lng['bairro']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtBairro" name="edtBairro" placeholder="Cidade da residência" value="<?php if( $op != "I" ) { echo $dados->usubairro; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>

		<div class="form-group row my-2">
		  <label for="edtNome" class="col-form-label"><?php echo $lng['cidade']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtCidade" name="edtCidade" placeholder="Cidade da residência" value="<?php if( $op != "I" ) { echo $dados->usucidade; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>

		<div class="form-group row my-2">
		  <label for="edtNome" class="col-form-label"><?php echo $lng['estado']; ?> <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtEstado" name="edtEstado" placeholder="Estado da residência" value="<?php if( $op != "I" ) { echo $dados->usuestado; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>

		<div class="form-group row my-2">
		  <label for="edtNome" class="col-form-label">IBGE <h11 class="asterisco">*</h11></label>
			<div >
				<input type="text" class="form-control" id="edtIbge" name="edtIbge" placeholder="IBGE da residência" value="<?php if( $op != "I" ) { echo $dados->usuibge; } ?>" <?php if( $op == "C" ) echo "readonly" ?>>
			</div>
		</div>
		</div>
	</div>
		<div class="col-md-12 my-4" >
			<div class="form-group col-md-11">
				<label class="col-md-5">&nbsp;</label>
				<button type="button" class="botaosair" onClick="window.open('usuario.php', '_self')"><?php echo $lng['sair']; ?></button>
				<label class="col-md-1">&nbsp;</label>
				<button type="submit" class="botaocad" <?php if( $op == "C" ) echo "disabled" ?> ><?php echo $lng['salvar']; ?></button>
			</div>
		</div>
</form>

	<p>&nbsp;</p>

<?php include_once("rodape.php"); ?>

<script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#edtRua").val("");
                $("#edtBairro").val("");
                $("#edtCidade").val("");
                $("#edtEstado").val("");
                $("#edtIbge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#edtCep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#edtRua").val("...");
                        $("#edtBairro").val("...");
                        $("#edtCidade").val("...");
                        $("#edtEstado").val("...");
                        $("#edtIbge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#edtRua").val(dados.logradouro);
                                $("#edtBairro").val(dados.bairro);
                                $("#edtCidade").val(dados.localidade);
                                $("#edtEstado").val(dados.uf);
                                $("#edtIbge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>