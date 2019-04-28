

<?php

	/*
	 * e sistema está baseado no metodo get
	 * ele usa sinalisadores com tt para se manter na pagina
	 * ao mesmo tempo que sinaliza quem está enviando o comando
	 */



	if(isset($_GET["LED"])){				// para controle do botão
		$CtlLed = $_GET["LED"];
	
		shell_exec("gpio mode 25 out");

		if($CtlLed[0] == 1){
			shell_exec("gpio write 25 1");
		} else if($CtlLed[0] == 0){
			shell_exec("gpio write 25 0");
		}
	}


	if(isset($_GET["BT"])){					// controle do layout
		include "matrizClt.inc";
		include "funcPrinf.php";

		shell_exec("gpio mode 24 up");			// configurar pino de saida
		

		if(shell_exec("gpio read 24") == 1){		// le estado da entrada 
			$msgOUT = " ATIVADO";
		} else{
			$msgOUT = " DESATIVADO";

		}

		$var = $_GET["BT"];

	

		for($idx=0; $idx<5; $idx++){			// mostar menus
			if( ($var == $Mclt[$idx][0]) || ($var == "tt") ){
				printBlock($Mclt, $idx, "Entrada ".$Mclt[$idx][1].$msgOUT);
			}		
		} 
		/*botão volta*/
		echo "<div style='width: 100%;' class='row'><button style='width: 100%;' id='VOLTA' type='button' class='col btn btn-dark border-light'>voltar</button></div>";
		prinfScript($Mclt, $var);
	} else {
		/*para erro de entrada.....*/
		echo "<h1 ID='MENU_TITLE' class=' row  p-2 text-center text-white'> ERROR DE SELEÇÃO </h1>";
		echo "<div style='width: 100%;' class='row'><button style='width: 100%;' id='VOLTA' type='button' class='col btn btn-dark border-light'>voltar</button></div>";

		echo "<script type='text/javascript'>
		window.onload = function(){
			document.getElementById('VOLTA').addEventListener('click', function(){window.location.href = './index.html';})
		}</script>";			

	}
?>
