<?php


include("./Functions.php");
$conexion=conectar();

 $id_area = $_POST['id_area'];
 $option=$_POST['option'];



 if($option==0){

	$result = $conexion->query("SELECT id_user, user_name FROM  user
                            WHERE id_area= ".$id_area." ORDER BY user_name ASC");
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {                
			$html .= '<option value="'.$row['id_user'].'">'.$row['user_name'].'</option>';
		}
	}


 }

 if($option==1){

	$result = $conexion->query("SELECT DISTINCT u.id_user,
								u.user_name
								FROM task t
								INNER JOIN user u ON t.id_user=u.id_user
								WHERE t.id_area= ".$id_area." ORDER BY u.user_name ASC");
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {                
			$html .= '<option value="'.$row['id_user'].'">'.$row['user_name'].'</option>';
		}
	}

	
}

	


$html = '<option value=""></option>'.$html;
echo $html;
?>