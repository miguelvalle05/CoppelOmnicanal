<html>
    <head>

    </head>

    <body>
    <?php		
		include("./Functions.php");
		$conexion = conectar();
		
        $str_json = file_get_contents('php://input');

        $array = json_decode($str_json, true);

            var_dump($array);
          
		
			Foreach ($array as $item) 
            { 
               
               
				$query="UPDATE task
                SET
                task_description='" . $item[ "description" ] . "',
                id_area='" . $item[ "area" ] . "',
                id_user='" . $item[ "coworker" ] . "',
                registration_date='" . $item[ "registration" ] . "',
                finish_date='" . $item[ "finish" ] . "',
                status='" . $item[ "status" ] . "'
                WHERE id_task='" . $item[ "task" ] . "'"; 
			    $result=$conexion->query($query);
                if (!$result)
                    {									
					die("<br />ERROR al actualizar tarea: ".mysql_error());
				
					}
                    else    
                    
                    {
                        
                        $id=mysqli_insert_id($conexion);
                        echo "Tareas actualizado=".$query."<br /><br />";

                    }

            }

	?>
    </body>
</htm>
