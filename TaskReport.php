<?php

include("./Functions.php");

$conexion=conectar();


$area = $_POST['area'];
$user = $_POST['user'];
$status = $_POST['status'];


    if($area!="") {
        $valor2=" t.id_area = $area";
        $AND2=" AND ";
    
        }
        else {
            $valor2="";
            $AND2="";	
    
        }
    if($user!="") {
        $valor3=" t.id_user = $user";
        $AND3=" AND ";
    
        }
        else {
            $valor3="";
            $AND3="";	
    
        }
    
    if($status!="") {
        $valor4=" t.status = $status";
        
        
    
        
        }
        else {
            $valor4="";
            
            
    
     
        }


        

     
    
    
    
    if($area==""&&$user=="" && $status=="" ){
        $consultageneral=" ";
       
        }
    else{
        //? manejo de filtros 
        $consultageneral=" WHERE ".$valor2.$AND2.$valor3.$AND3.$valor4;
        if(substr($consultageneral, -4)=="AND "){
            $consultageneral=substr($consultageneral, 0, -4);
            $consultageneral=$consultageneral;
            
    
          
    
    
            
        }
        else {
            $consultageneral=$consultageneral;
        
        }
      
    }




    
    
    if ($conexion->connect_errno) {
        printf("Connect failed: %s\n", $conexion->connect_error);
        exit();
    }

    $scarpeta="./temporal/";
    $nombref="TaskReport_".date('j-m-y').str_replace('.','',microtime(TRUE)).".xls";
    $sfile=$scarpeta.$nombref;//ruta del archivo a generar

 
        $vhtml='<table><thead><tr><td>id tarea</td><td>usuario</td><td>area</td><td>descripcion de tarea</td><td>fecha de inicio</td><td>fecha de finalizacion</td><td>status</td></tr></thead>';
        $consulta="SELECT t.id_task,
        u.user_name as user,
        a.area_description as area,
        t.status as status,
        t.registration_date as inicio,
        t.finish_date as final,
        t.task_description as descripcion
        FROM task t
        INNER JOIN user u ON t.id_user=u.id_user
        INNER JOIN area a ON t.id_area=a.id_area
        ".$consultageneral."";

        $result = $conexion->query($consulta);
        
        if (!$result){
            die("<br />error en la consulta: ".$consulta.mysql_error());
            //echo $cargaratributos;				
        } else {

            $cont=0;
            $fp=fopen($sfile,"w" ); 

            $vhtml.="<tbody>";
            
           

            while($row = $result->fetch_assoc()){
                $vhtml.="<tr>";

                $vhtml.="<td>".$row['id_task']."</td>";
                $vhtml.="<td>".$row['user']."</td>";
                $vhtml.="<td>".$row['area']."</td>";
                $vhtml.="<td>".$row['descripcion']."</td>";
                $vhtml.="<td>".$row['inicio']."</td>";
                $vhtml.="<td>".$row['final']."</td>";

                if($row['status']==0){
                    $vhtml.="<td>Pendiente</td>";

                }
                else{

                    $vhtml.="<td>Completado</td>";

                }
              

                $vhtml.="</tr>";
                
            }

           

                                                    
        }

    
                                
            $vhtml.= "</tbody></table>";



    
        
       
        fwrite($fp,$vhtml); 
        fclose($fp);
    
                                        
    echo "<br /> "."<a  href=./temporal/".$nombref."><img src=./img/EXCEL-ICON.png /></a>";		
    $conexion->close();


?>

