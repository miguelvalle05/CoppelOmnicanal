<?php

include './TaskModel.php';

$model = new ModelProduct();


$opcion = $_POST['opcion'];
$area = $_POST['area'];
$user = $_POST['user'];
$status = $_POST['status'];





if(isset($_POST['opcion']) && empty($_POST['otro'])&& $opcion==1){

    if($area!="") {
        $valor2=" id_area = $area";
        $AND2=" AND ";
    
        }
        else {
            $valor2="";
            $AND2="";	
    
        }
    if($user!="") {
        $valor3=" id_user = $user";
        $AND3=" AND ";
    
        }
        else {
            $valor3="";
            $AND3="";	
    
        }
    
    if($status!="") {
        $valor4=" status = $status";
        
        
    
        
        }
        else {
            $valor4="";
            
            
    
     
        }

    
    if($area==""&&$user=="" && $status==""){
       
        }
    else{
        // manejo de filtros 
        $consultageneral=" WHERE ".$valor2.$AND2.$valor3.$AND3.$valor4;
        if(substr($consultageneral, -4)=="AND "){
            $consultageneral=substr($consultageneral, 0, -4);
            $consultageneral=$consultageneral;
            
    
            $rows = $model->fetch_filter($consultageneral);
          
    
    
            
        }
        else {
            $consultageneral=$consultageneral;
        $rows = $model->fetch_filter($consultageneral);
        }
      
    }


        


    

  

}
else{
    $rows = $model->fetch();

}



echo json_encode($rows);