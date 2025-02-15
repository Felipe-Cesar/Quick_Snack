<?php

	require_once('Config/Config.php');

$cargo = new Cargo();
$allCargo = $cargo->consultarALLCargo();


$funcionario = new Funcionario();
$fun = $funcionario->obterLinha($_GET['editar']);


?>





<div class="formulario">

<h1 >Editar Funcionário</h1>
	


	<form  method="POST"  action="Controllers/FunEditarController.php">
		
	    <fieldset>
		
			<legend>Informações do Funcionario</legend>

			<input type="hidden" name="idFun" 
			value="<?php print $fun['cod_funcionario']; ?>">

				<label>Nome Funcionário</label>
		     	<input type="text" autofocus name="nome" id="nome" placeholder="Nome Completo" class="input" pattern="[a-zA-zá\u00C0-\u00FF\s]+$" title="*Apenas letras" 
		     	maxlength="45" required value="<?php print $fun['nome']; ?>">
				

				<div id="esquerda">	
					
					<label >CEP</label>
					<input type="text="  placeholder="00000-000" name="cep" class="input"
					pattern="\d{5}-\d{3}" maxlength="10" title="00000-000" required
					value="<?php print $fun['cep']; ?>">
				

					<label >Login</label>
					<input type="text" placeholder="login" id="login" name="loginFun" class="input" readonly required value="<?php print $fun['login'];?>">

					
					<label>Senha</label>
					<input type="password" placeholder="Senha" id="senha" name="senha" 
					class="input" maxlength="100" required>
				
					<label id="ativado">
					<input type="checkbox"  name="ativado" 
					<?php $fun['ativado'] == 1 ? print 'checked' : ''?>>
					
						Ativado
				
					</label>

				</div>

				<div id="direita">

					<label>Telefone/Celular</label>
					<input type="text" placeholder="(11) 99999-9999" name="tel_cel" class="input"  
					pattern="\(\d{2}\)\s*\d{5}-\d{4}" title="(11) 11111-1111" maxlength="15" required value="<?php print $fun['tel_cel'];?>">

			
					<label>Cargo</label>
					<select required name="codigoCargo">
						
						<option selected disabled value="">Escolha o cargo</option>


						<?php foreach($allCargo as $linha):?>

						<option name="codigoCargo" value="<?php print $linha['cod_cargo'];?>"
						<?php $linha['cargo'] == $fun['cargo'] ? print 'selected' : '' ?>>

								<?php print $linha['cargo']?>

						</option>

						<?php endforeach;?>

					</select>
					


				<label>Confirma Senha</label>
					
					<input type="password"  placeholder="Confirmar Senha" name="confsenha" class="input" maxlength="100"  id="confsenha" required>

				</div>
			
				

				<button id="botao" type="submit" onclick="return validar()" name="submit">

					Editar

				</button>

		</fieldset>



	</form>

</div>
<script type="text/javascript">
		



document.getElementById("nome").addEventListener("input", function(){


		var login = document.getElementById("nome").value.split(" ");

		if(!(login == ".") && login != ""){

			 login = login[0]+"."+login[login.length - 1];
			 document.getElementById("login").value = login;
		
		}else{

			 document.getElementById("login").value = "";
		}});





</script>