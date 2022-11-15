<?php
include("./Functions.php");


class ModelTask
{
    

    public function fetch()
    {

        $conexion = conectar();
        if ($conexion->connect_errno) {
            printf("Connect failed: %s\n", $conexion->connect_error);
            
            }

            $queryOne = $conexion->query("SELECT t.id_task,
            u.user_name as user,
            t.status as statusF,
            t.task_description as descripcion
            FROM task t
            INNER JOIN user u ON t.id_user=u.id_user");
        
        
                    if ($queryOne->num_rows > 0) 
                        {
                            
                            while ($row = mysqli_fetch_assoc($queryOne)) {  
                                        
                                $data[] = $row;
        
                              
                            }
                        
                        
                            
                        }
                        else{
                            $data =  array ('descripcion' => 'No encontrado general');
                        }
                        mysqli_free_result($queryOne);
                        $conexion->close();	
        return $data;
    }

    //Filter 

    public function fetch_filter($consultageneral)
    {

        $conexion = conectar();
        if ($conexion->connect_errno) {
            printf("Connect failed: %s\n", $conexion->connect_error);
            
            }

            $queryOne = $conexion->query("SELECT t.id_task,
            u.user_name as user,
            t.status as statusF,
            t.task_description as descripcion
            FROM task t
            INNER JOIN user u ON t.id_user=u.id_user
            ".$consultageneral."");
  
                 
        
                    if ($queryOne->num_rows > 0) 
                        {
                            
                            while ($row = mysqli_fetch_assoc($queryOne)) {  
                                        
                                $data[] = $row;
        
                              
                            }
                        
                        
                            
                        }
                        else{
                            $data =  array ('descripcion' => 'No encontrado en aplicacion');
                        }
                       
                        mysqli_free_result($queryOne);
                        $conexion->close();	
        return $data;
    }



   
    

     
 
    
   
    
   
  
}