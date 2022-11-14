<html>
    <head>

    </head>

    <body>
    <?php		
		include("./Functions.php");
	    $conexion = conectar();
	    $task=$_POST['task'];
          

            $consulta= "DELETE FROM task WHERE id_task = '$task'";		
            if ($result = $conexion->query($consulta)) {
                 $resultado="$resultado<br />SE ELIMINO SERVICIO";
                 echo 1;		
            }
            else {
                $resultado=$resultado.$consulta."Error: al eliminar SERVICIO";
                echo 0; 

            }

	
	?>
    </body>
</htm>