<?php


include("./Functions.php");
$conexion=conectar();

 $id_area = $_POST['id_area'];

	$result = $conexion->query("SELECT id_user, user_name FROM  user
                            WHERE id_area= ".$id_area." ORDER BY user_name ASC");
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {                
			$html .= '<option value="'.$row['id_user'].'">'.$row['user_name'].'</option>';
		}
	}


$html = '<option value=""></option>'.$html;
echo $html;
?>