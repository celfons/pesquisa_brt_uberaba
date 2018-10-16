<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
		    $(".editar").click(function(){
		    	var id = $(this).attr('id');
		        var nome = $(this).attr('nome');
		        var data = $(this).attr('data');
		        var telefone = $(this).attr('telefone');
		        var endereco = $(this).attr('endereco');
		        $("#id1").val(id);
		        $("#nome1").val(nome);
		        $("#data1").val(data);
		        $("#telefone1").val(telefone);
		        $("#endereco1").val(endereco);
		    });
		});
		function excluir() {
		    var x;
		    if (confirm("TEM CERTEZA QUE DESEJA EXCLUIR ESSE REGISTRO?") == true) {
		        x = "EXCLUIR";
		    } else {
		        x = "CANCELAR";
		    }
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="form-group">
				<form class="form-inline" action="registra.php" method="POST">
					<label for="descricao">
					</label>
					<label for="nome">
						Nome: <input type="text" class="form-control" name="nome" id="nome" placeholder="Marcel Fonseca" required>
					</label>
					<label for="data">
						Nascimento: <input type="date" class="form-control" name="data" id="data" placeholder="" required>
					</label>
					<label for="telefone">
						Telefone: <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="34" required>
					</label>
					<label for="endereco">
						Endereço: <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua Mauricio" required>
					</label>
					<center>
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</center>
				</form>
				<?php

				$mysqli=mysqli_connect("mysql.hostinger.com.br","u561856790_root","EIqX18PrPq","u561856790_all");

				if (mysqli_connect_errno())
					{	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($mysqli,"SELECT * FROM sistema");

			$total=mysqli_num_rows($result);

			if ($total > 0){
				
				echo "Quantidade de Registros: " . $total;
				
				echo "<table class='table'>";
				echo "<tr>";
				echo "<td>";
				echo "-";
				echo "</td>";
				echo "<td>";
				echo "NOME";
				echo "</td>";
				echo "<td>";
				echo "DATA";
				echo "</td>";
				echo "<td>";
				echo "TELEFONE";
				echo "</td>";
				echo "<td>";
				echo "ENDEREÇO";
				echo "</td>";
				echo "<td>";
				echo "AÇÕES";
				echo "</td>";
				echo "</tr>";
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>";
					echo $row['id'];
					echo "</td>";
					echo "<td>";
					echo $row['nome'];
					echo "</td>";
					echo "<td>";
					echo date('d/m/Y', strtotime($row['data']));
					echo "</td>";
					echo "<td>";
					echo $row['telefone'];
					echo "</td>";
					echo "<td>";
					echo $row['endereco'];
					echo "</td>";
					echo "<td>";
					echo "<button class='btn btn-info btn-sm editar' data-toggle='modal' data-target='#editar' id='".$row['id']."' nome='".$row['nome']."' data='".$row['data']."' telefone='".$row['telefone']."' endereco='".$row['endereco']."'><span class='glyphicon glyphicon-pencil'></span></button><a class='btn btn-warning btn-sm' href='deletar.php?id=".$row['id']."' onclick='excluir()'><span class='glyphicon glyphicon-trash'></span></span></a>";
					echo "</td>";
					echo "</tr>";	
				}
				echo "</table>";
			}
			mysqli_close($mysqli);
			?>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="container">
		<p class="text-muted"></p>
	</div>
</footer>
<div class='modal fade' id='editar' role='dialog'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>	
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				<h4 class='modal-title'>EDITAR</h4>
			</div>
			<div class='modal-body'>
				<form class="form-inline" action="atualiza.php" method="POST">
					<label for="descricao">
					</label>
					<input type="hidden" id='id1'>
					<label for="nome">
						Nome: <input type="text" class="form-control" name="nome" id="nome1" placeholder="Marcel Fonseca" required>
					</label>
					<label for="data">
						Nascimento: <input type="date" class="form-control" name="data" id="data1" placeholder="" required>
					</label>
					<label for="telefone">
						Telefone: <input type="tel" class="form-control" id="telefone1" name="telefone" placeholder="34" required>
					</label>
					<label for="endereco">
						Endereço: <input type="text" class="form-control" id="endereco1" name="endereco" placeholder="Rua Mauricio" required>
					</label>
					<center>
						<button type="submit" class="btn btn-success">Editar</button>
					</center>
				</form>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>FECHAR</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>