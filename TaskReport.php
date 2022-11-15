<?php

include("./Functions.php");

$conexion=conectar();
$equipmentR = 1;



    
    
    if ($conexion->connect_errno) {
        printf("Connect failed: %s\n", $conexion->connect_error);
        exit();
    }

    $scarpeta="/coppelomnicanal/temporal/";
    $nombref="TaskReport_".date('j-m-y').str_replace('.','',microtime(TRUE)).".xls";
    $sfile=$scarpeta.$nombref;//ruta del archivo a generar

  if($equipmentR!=0)
  
  {
        $vhtml='<table><thead><tr><td>id</td><td>usuario</td>';
        $consulta="SELECT * FROM task";

        $result = $conexion->query($consulta);
        
        if (!$result){
            die("<br />error en la consulta: ".$consulta.mysql_error());
            //echo $cargaratributos;				
        } else {

            $cont=0;
            $fp=fopen($sfile,"w" ); 

            $vhtml.="<tbody>";
            
           

            while($row = $result->fetch_assoc()){
                $vhtml.="<td>";

                $vhtml.="<tr".$row['id_task']."</tr>";
                $vhtml.="<tr".$row['id_user']."</tr>";

                $vhtml.="</td>";
                
            }

           

                                                    
        }

    
                                
            $vhtml.= "</tbody></table>";



    }
        
       
        fwrite($fp,$vhtml); 
        fclose($fp);
    
                                        
    echo "<br /> "."<a  href=./temporal/".$nombref."><img src=./img/EXCEL-ICON.png /></a>";		
    $conexion->close();


?>

