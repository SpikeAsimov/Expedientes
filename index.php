<?php 
	function listadoDirectorio($directorio){
	    $listado = scandir($directorio);	    
	    unset($listado[array_search('.', $listado, true)]);
	    unset($listado[array_search('..', $listado, true)]);
	    if (count($listado) < 1) {
	        return;
	    }
	    foreach($listado as $elemento){
	    	
	    	if(!is_dir($directorio.'/'.$elemento)) {
	        	echo "<li class='list-inline-item'>- <a href='$directorio/$elemento' target='_blank'>$elemento</a></li>";
	        }
	        if(is_dir($directorio.'/'.$elemento)) {
	        	echo '<li class="open-dropdown"> > '.$elemento.'</li>';
	    		echo '<ul class="dropdown d-none">';
	        		listadoDirectorio($directorio.'/'.$elemento);
	    		echo '</ul>';
	        }
	    }
	}

	function listarArchivos($dir){
		$cont= 0;
		$listado = scandir($dir, 0);
		unset($listado[array_search('.', $listado, true)]);
		unset($listado[array_search('..', $listado, true)]);
		if (count($listado) < 1) {
			return;
		}
		  

		foreach ($listado as $elemento) {
			$cont ++;
			if (!is_dir($dir.'/'.$elemento)) {
				echo "	<ul>
					      	<li class='list-inline-item'>- <a href='$dir/$elemento' target='_blank'>$elemento</a></li>
						</ul>
			    	";
			}
			if (is_dir($dir.'/'.$elemento)) {
				echo "<tr>				
				      	<td>$cont</td>
				      	<td>G02 - 01 - 00";
				echo substr($elemento, 4, 3);
				echo " - ";
				echo substr($elemento, 6, 2);
				echo "- 22";
				echo "</td>	
						<td colspan='4'> 
					      <li class='open-dropdown' style='cursor: pointer;'>						  	
							<i id='icono' class='fa fa-folder-o' aria-hidden='true'></i> Abrir carpeta
						  </li>
					      <ul class='dropdown d-none'>";
					      	listarArchivos($dir.'/'.$elemento);
				echo "
					      </ul>
					    </td>					    
			    	</tr>";

			}
		}

	}
	//listadoDirectorio('C:\Descargas Esidif');
?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Expedientes - Dirección General de Administración </title>
    <meta name="description"
          content="Expedientes - Área General de Administración."/>

    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">

    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Bootstrap CSS / Color Scheme -->
    <link rel="stylesheet" href="css/red.css" id="theme-color">

	<style>
		ul {
			list-style-type: none;
		}
		.d-none {
			display: none;
		}
		.open-dropdown {
			font-weight: bold;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

</head>
<body>

<!--navigation-->
<section class="smart-scroll">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand heading-black" href="index.html">
                Dirección General de Administración
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Archivos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>


<!-- features section -->
<section class="pt-6" id="ordenProvision">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading-black">Orden de Provisión</h2>

                <form class="mb-2 p-4" id="formOrdenes" method="post">
                    <div class="form-group mb-2 p-4 col-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic">Último N°</span>
                        </div>
                        <input type="text" class="form-control" id="ultimoNro" aria-describedby="basic" disabled>
                    </div>
                    <div class="form-inline col-12">
                        <div class="form-group mb-2 p-4">
                            <label for="ordenes" class="col-form-label">Cantidad de órdenes</label>
                        </div>
                        <div class="form-group mb-2 p-4">
                            <input type="number" class="form-control" id="cantidadOrdenes" value="1">
                        </div>

                        <div class="form-group mb-2 p-4">
                            <button type="submit" class="btn btn-secondary" onclick="crearOrden()" id="btnOrden">Crear orden/es</button>
                            <button type="button" class="btn btn-primary" onclick="imprimirOrden()" id="btnImprimir">Imprimir ordenes</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</section>


<hr>


<!-- features section -->
<section class="pt-6 pb-7" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                <h2 class="heading-black">Expedientes 2022</h2>
					<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Numero</th>
						      <th scope="col">Archivos</th>
						    </tr>
						  </thead>
						  <tbody>
								<?php 
										listarArchivos('Expedientes');
										//listadoDirectorio('Expedientes'); 
								?>
						  </tbody>
					</table>
            </div>
        </div>
    </div>
</section>



<!--footer-->
<footer class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mr-auto">
                <h5>Secretaría de Tierras - Dirección General de Administración </h5>                
                <ul class="list-inline social social-sm">
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="row mt-5">
            <div class="col-12 text-muted text-center small-xl">
                &copy; 2022 Dirección General de Administración - All Rights Reserved
            </div>
        </div>
    </div>
</footer>

<!--scroll to top-->
<div class="scroll-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>

<!-- theme switcher (FOR DEMO ONLY - REMOVE FROM PRODUCTION)-->
<div class="switcher-wrap">
    <div class="switcher-trigger">
        <span class="fa fa-gear"></span>
    </div>
    <div class="color-switcher">
        <h6>Color Switcher</h6>
        <ul class="mt-3 clearfix">
            <li class="bg-teal active" data-color="default" title="Default Teal"></li>
            <li class="bg-purple" data-color="purple" title="Purple"></li>
            <li class="bg-blue" data-color="blue" title="Blue"></li>
            <li class="bg-red" data-color="red" title="Red"></li>
            <li class="bg-green" data-color="green" title="Green"></li>
            <li class="bg-indigo" data-color="indigo" title="Indigo"></li>
            <li class="bg-orange" data-color="orange" title="Orange"></li>
            <li class="bg-cyan" data-color="cyan" title="Cyan"></li>
            <li class="bg-yellow" data-color="yellow" title="Yellow"></li>
            <li class="bg-pink" data-color="pink" title="Pink"></li>
        </ul>
        <p>These are just demo colors. You can <b>easily</b> create your own color scheme.</p>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>