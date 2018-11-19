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

		function registraVaga(){
	
			$titulo = $_POST['titulo'];
			$area = $_POST['area'];
			$requisito = $_POST['requisito'];
			$idsupervisor = $_POST['idsupervisor'];
			$status = $_POST['status'];
		

			$sql = "INSERT INTO vagas( titulo, area, requisito, idsupervisor, status) values ('$titulo', '$area', '$requisito', '$idsupervisor', '$status')";

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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=form_vaga.php'>
					<script type=\"text/javascript\">
						alert(\"Não foi possível realizar o cadastro!\");
					</script>
					";
			}
		}

		function registraEstagio(){
			
			$data1 = str_replace("/", "-", $_POST["data-inicio"]);
			$data_inicio = date('Y-m-d', strtotime($data1));

			$data2 = str_replace("/", "-", $_POST["data-fim"]);
			$data_fim = date('Y-m-d', strtotime($data2));

			$status = $_POST['status'];
			$aluno = $_POST['rga'];
			$supervisor = $_POST['idsupervisor'];
			

			$sql = "INSERT INTO estagio( data_inicio, data_fim, status, aluno_rga, supervisor_idsupervisor) values ('$data_inicio', '$data_fim', '$status', '$aluno', '$supervisor')";

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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=form_vaga.php'>
					<script type=\"text/javascript\">
						alert(\"Não foi possível realizar o cadastro!\");
					</script>
					";
			}
		}

		function registraCampus(){
	
			$nome = $_POST['nome'];
			$diretor = $_POST['diretor'];
			$email = $_POST['email'];
			$site = $_POST['site'];
			$cnpj = $_POST['cnpj'];
		

			$sql = "INSERT INTO campus(nome, diretor, emailDirecao, site, Instituicao_cpnj) values ('$nome', '$diretor', '$email', '$site', '$cnpj')";

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
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=form_vaga.php'>
					<script type=\"text/javascript\">
						alert(\"Não foi possível realizar o cadastro!\");
					</script>
					";
			}
		}
		
	?>