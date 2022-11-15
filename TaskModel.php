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

            $queryOne = $conexion->query("SELECT id_task,
            id_user,
            task_description as descripcion
            FROM task");
        
        
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

            $queryOne = $conexion->query("SELECT DISTINCT codigo,
            descripcionl as descripcion
            FROM vista_aplica_nombres_desc_ap
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