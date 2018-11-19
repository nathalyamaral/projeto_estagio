<?php
	require_once('functions.php');
?>

	<div class="container">
	   	<br />
	   	<div class="col-md-2"></div>

	   	<div class="col-md-7">
	   		<h3 class="page-header">Cadastro Estagio</h3>

	   		<?php
	   			include_once('bd.class.php');
	   			$objBd = new bd();
				$link = $objBd->conecta_mysql();
	   		?>

	   		<form method="post" action="form_estagio.php" id="form_estagio">

	   			<div class="form-group date col-md-8">
					<label for="data-inicio" class="control-label">Data Inicio *</label>
					<input type="text" class="form-control data " id="data-inicio" name="data-inicio" required="requiored">
				</div>

				<div class="form-group date col-md-8">
					<label for="data-fim" class="control-label">Data Fim *</label>
					<input type="text" class="form-control data " id="data-fim" name="data-fim" required="requiored">
				</div>

				<div class="form-group">
					<label class="radio-inline"><input type="radio" name="status" value="P" >P</label>
					<label class="radio-inline"><input type="radio" name="status" value="A" >A</label>
					<label class="radio-inline"><input type="radio" name="status" value="CA" >CA</label>
					<label class="radio-inline"><input type="radio" name="status" value="CR" >CR</label>
				</div>


				<div class="row">
					<div class="form-group col-md-6">
						<label for="rga" class="control-label">Aluno
							<option value="">Selecione...</option>
							<?php
								$result_aluno = "SELECT * FROM aluno ORDER BY rga";
								$resultado_aluno = mysqli_query($link, $result_aluno);
								while($row_aluno = mysqli_fetch_assoc($resultado_aluno)){
									echo '<option value="'.$row_aluno['rga'].'">'.$row_aluno['users_cpf'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="idsupervisor" class="control-label">Supervisor
							<option value="">Selecione...</option>
							<?php
								$result_supervisor = "SELECT * FROM supervisor ORDER BY idsupervisor";
								$resultado_supervisor = mysqli_query($link, $result_supervisor);
								while($row_supervisor = mysqli_fetch_assoc($resultado_supervisor)){
									echo '<option value="'.$row_estagio['idsupervisor'].'">'.$row_supervisor['users_cpf'].'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<br />
				<button type="submit" class="btn btn-primary form-control" name="submit">Cadastrar</button>
	    	</form>
	    </div>
	</div>

	<?php 
		if(isset($_POST['submit'])){
			registraEstagio();
		}
	?>

