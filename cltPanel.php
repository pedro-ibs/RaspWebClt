<!DOCTYPE html><html>

<head>
	<meta charset="utf-8">
	<meta name="descripton" content="Projeto 1 de LP1" />
	<meta name="author" content="Pedro Igor B. S. GU3003094" />
	<meta name="generator" content="visualCode"/>
	<meta name="keywords" content="HAL-900, automacao, assistente" />
	
	<title>HAL-9000 Controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!--
	<link href="./bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/css/bootstrap-grid.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/etc/mdb.min.css" rel="stylesheet">
	<link href="./bootstrap-4.3.1-dist/etc/bootstrap.min.css" rel="stylesheet" >
	<script src="./bootstrap-4.3.1-dist/etc/jquery-3.3.1.slim.min.js"></script>
	<script src="./bootstrap-4.3.1-dist/etc/popper.min.js"></script>
	<script src="./bootstrap-4.3.1-dist/etc/bootstrap.min.js"></script>
	<link href="./fonts/googleFonts" rel="stylesheet">
	-->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet"> 


	<!-- meus estilos  -->
	<link href="./myCSS/main.css" rel="stylesheet">
</head>

<body ID="_body" class="container text-white align-self-center">

	<!-- determina o tamanho e alinha ao centro  -->
	<div style="padding-top:3%;" class="row w-50 mx-auto my-auto justify-content-center align-self-center">
					
			<div style="width: 100%;" ID="BORD" class="row  border-success p-1 m-1">
				<h3 ID="MENU_TITLE" class="text-center mx-auto my-auto">Painel de Controle</h3><br/>

				<!-- menu  -->
				<h5 class="col">
					<div class="row"><button id="NET" type="button" class="col btn btn-dark border-success">Dados da Rede</button></div>
					<div class="row"><button id="USB" type="button" class="col btn btn-dark border-success">Dispositivos</button></div>
					<div class="row"><button id="FREE" type="button" class="col btn btn-dark border-success">Status do Servido</button></div>
					<div class="row"><button id="INFO" type="button" class="col btn btn-dark border-success">Informações</button></div>
					<div class="row"><button id="CNCT" type="button" class="col btn btn-dark border-success">Conexões</button></div>
					<div class="row"><button id="PROC" type="button" class="col btn btn-dark border-success">Processos</button></div>

					<div class="row"><button id="PWD" type="button" class="col btn btn-dark border-danger">Desligar o Sistema</button></div>

				</h5>					
			</div>
	
			<!-- terminal de resposta dos comandos  -->
			<div style="width: 100%;" ID="BORD" class="row   border-info p-1 m-1">
				<h3 ID="MENU_TITLE" class="text-center mx-auto my-auto">Terminal</h3><br/>
				<p id="TREM" class="text-justify">
					<?php
						/* para cada botão o isset verifica 
						 * se o mesmo foi precioando
						 * apos indentificar ele envia o comando
						 * e retona o resultado para a pagina web
						 * são comandos basicos do linux 
						 */
						if(isset($_GET["NET"])){
							$output = shell_exec("ifconfig");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
							$output = shell_exec("ip addr show");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
						}  else if(isset($_GET["USB"])){
							$output = shell_exec("lsusb");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
						} else if(isset($_GET["FREE"])){
							$output = shell_exec("free");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
						}else if(isset($_GET["INFO"])){
							$output = shell_exec("hostname");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
							$output = shell_exec("uname -a");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
							$output = shell_exec("hostname -I");
							echo "<pre id='TREM' class='text-left'>$output</pre>";							
						}else if(isset($_GET["CNCT"])){
							$output = shell_exec("netstat");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
						}else if(isset($_GET["PROC"])){
							$output = shell_exec("ps aux");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
							$output = shell_exec("pstree");
							echo "<pre id='TREM' class='text-left'>$output</pre>";
						}
						/*terminal vasil*/
						else{
							echo "Sem resposta....<br>";
							echo "Realise uma operarão<br>";
						}		
					?>
				</p>				
			</div>
	
			<!-- botão de volta -->
			<footer style="width: 100%;" id="MENU_TITLE" class=" p-2 m-2 text-center text-white">
				<div class="row border-dark p-1 m-1">
					<button id="VOLTA" type="button" class="col btn btn-dark border-light">voltar</button>
				</div>
			</footer>
	</div>
		

	<script type="text/javascript">
		window.onload = function(){
			document.getElementById('NET').addEventListener('click', function(){window.location.href = "./cltPanel.php?NET=net";})
			document.getElementById('USB').addEventListener('click', function(){window.location.href = "./cltPanel.php?USB=usb";})
			document.getElementById('FREE').addEventListener('click', function(){window.location.href = "./cltPanel.php?FREE=free";})
			document.getElementById('INFO').addEventListener('click', function(){window.location.href = "./cltPanel.php?INFO=info";})
			document.getElementById('CNCT').addEventListener('click', function(){window.location.href = "./cltPanel.php?CNCT=cnct";})
			document.getElementById('PROC').addEventListener('click', function(){window.location.href = "./cltPanel.php?PROC=proc";})
			document.getElementById('PWD').addEventListener('click', function(){window.location.href = "./pwd.html";})

			document.getElementById('VOLTA').addEventListener('click', function(){window.location.href = "./index.html";})
		}
	</script>	


</body></html>