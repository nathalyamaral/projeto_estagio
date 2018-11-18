	<?php

	    include_once('bd.class.php');

	    $objBd = new bd();
		$link = $objBd->conecta_mysql();
		
		function registraSuper(){
	
			$cargo = $_POST['cargo'];
			$area = $_POST['area'];
			$cpf = $_POST['cpf'];
			$cnpj = $_POST['cnpj'];
			$idestagio = $_POST['idestagio'];
		

			$sql = "INSERT INTO supervisor(empresa_cpnj, Users_cpf, cargo, area_atuacao) values ('$cnpj', '$cpf', '$cargo', '$area')";

			mysqli_query($link, $sql);

			if($sql){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=home.php'>
					<script type=\"text/javascript\">
						alert(\"Cadastro realizado com sucesso!\");
					</script>
					";
			}
			else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=form_super.php'>
					<script type=\"text/javascript\">
						alert(\"Não foi possível realizar o cadastro!\");
					</script>
					";
			}
		}

		
	?>