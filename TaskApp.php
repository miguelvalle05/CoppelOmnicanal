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
               
               
				$query="INSERT INTO task (id_task,task_description,id_area,id_user,registration_date,finish_date,status) 
                VALUES ('', '" . $item[ "description" ] . "', '" . $item[ "area" ] . "', '"  . $item[ "coworker" ] . "', '"  . $item[ "registration" ] . "', '"  . $item[ "finish" ] . "', '"  . $item[ "status" ] . "');"; 
			    $result=$conexion->query($query);
                if (!$result)
                    {									
					die("<br />ERROR al agregar tarea: ".mysql_error());
				
					}
                    else    
                    
                    {
                        
                        $id=mysqli_insert_id($conexion);
                        echo "Tareas cargadas=".$query."<br /><br />";

                    }

            }

	?>
    </body>
</htm>
