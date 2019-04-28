<?php
	function printBlock($_inc, $_idx, $_msg){
		echo"<div  style='padding-top:3%;' class='row mx-auto my-auto'>		<!-- caixa principal que divide os setores  -->
				<div id='BORD' class='row border-light p-1 m-1'>	<!-- caixa borda  -->
					<div class='col justify-content-center align-self-center'>	<!-- coluna do hal-9000  -->
						<h1 ID='MENU_TITLE' class='text-center'>".$_inc[$_idx][1]."</h1>
						<img id='bIMG' style='padding-top:7%;' class='img-thumbnail' src='./img/001.svg.png' alt='Foto do HAL-900 camera'></img>
					</div>

					<div ID='BORD' class='col border-success p-1 m-1'>	<!-- caixa do menu  -->

						<h5 ID='MENU_TITLE' class='text-center'>".$_inc[$_idx][2]."</h5>

						<!-- imagem do setor  -->
						<img id='bIMG' style='padding-top:7%;' class='img-thumbnail' src='./img/".$_inc[$_idx][3]."' alt='".$_inc[$_idx][4]."'></img>

						<!-- caixa da entrada so setor  -->
						<h3 style='background: #2a2a2e; border-radius: 4px;' class='text-center border border-warning  p-1 m-1'>".$_msg."</h3>					

						<!-- botões -->
						<div class='col'>
							<div class='row'>
								<button id='ON".$_inc[$_idx][0]."' type='button' class='col btn btn-dark border-success'>ON</button>
								<button id='OFF".$_inc[$_idx][0]."' type='button' class='col btn btn-dark border-success'>OFF</button>
							</div>
						</div>
					</div>
				</div>
			</div>";
	}

	function prinfScript($_inc, $_out){	// monta java script dos clicks
		echo "<script type='text/javascript'> window.onload = function(){\n";
		echo "document.getElementById('VOLTA').addEventListener('click', function(){window.location.href = './index.html';})\n";

		for($idx=0; $idx<5; $idx++){	// montar comandos
			if( ($_out == $_inc[$idx][0]) || ($_out == "tt") ){
				echo "document.getElementById('ON".$_inc[$idx][0]."').addEventListener('click', function(){window.location.href ='./controle.php?BT=".$_out."&LED=1".$_inc[$idx][0]."/';})\n";
				echo "document.getElementById('OFF".$_inc[$idx][0]."').addEventListener('click', function(){window.location.href ='./controle.php?BT=".$_out."&LED=0".$_inc[$idx][0]."/';})\n";
			}
		}
		echo "}</script>";
	}
?>