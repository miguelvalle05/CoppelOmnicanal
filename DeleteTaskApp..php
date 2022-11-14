<html>
    <head>

    </head>

    <body>
    <?php		
		include("./funciones.php");
		$conexion = conectar();
		
    

      
            $codigo=$_POST['codigo'];
            echo $codigo;




               
            $consulta= "DELETE FROM equipmenthistory_ap WHERE codigo = '$codigo'";		
            if ($result = $conexion->query($consulta)) {
                 $resultado="$resultado<br />SE ELIMINO SERVICIO";
                 echo 1;		
            }
            else {
                $resultado=$resultado.$consulta."Error: al eliminar SERVICIO";
                echo 0; 

            }


             
            $consulta= "DELETE FROM assingfeaturesvalue_ap WHERE codigo = '$codigo'";		
            if ($result = $conexion->query($consulta)) {
                 $resultado="$resultado<br />SE ELIMINO ATRIBUTOS";		
                 echo 1; 
            }
            else{
                $resultado=$resultado.$consulta."Error: al eliminar ATRIBUTOS";
                echo 0; 
               

            } 


                    



             
			
	
	?>
    </body>
</htm>