<?php



include("./Functions.php");
$conexion = conectar();
$taskV=$_POST['taskV'];
//echo $codigo;

                    $result = $conexion->query("

                    SELECT 
                    task_description,
                    id_area,
                    id_user,
                    registration_date,
                    finish_date,
                    status
                    FROM
                    task
                    WHERE  id_task =  ".$taskV."     
                   						
                    ");
                            

                    if ($result->num_rows > 0) 

                    {
                        $set=array();
                        $arr = array();


                        while ($row = $result->fetch_assoc()) {  	
                            
                            
                            $set[]=$row;
                           
                                
                            }
                            $arr['app'] = $set;

                            
                            echo json_encode($arr);


                        
                    }
                    else{
                        echo 0;
                    }

?>