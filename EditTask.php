<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task </title>
    
</head>
<body>
    

<h1 class="labeltopicmain">Task</h1>
<div class="container">
    
<?php	
        $taskEdit=$_GET['id_task'];
		include("./Functions.php");
	    $conexion = conectar();
       

?>

<form action="" id="frmGeneral" name="frmGeneral" method="POST" >


    <div class="row">

            <div class="col-md-3">
            <label class="labeltittle">Task</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-tasks"></i></span>
            <input type="input" class="form-control" name="task" id="task" title="Task" value="<?php echo $taskEdit ?>" placeholder="Task">
            </div>
            </div>


            <div class="col-md-3">
            <label class="labeltittle">Area</label>
            <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-building"></i></span>
            <select class="form-select" name="area" id="area" title="Area">
														<option selected value=""></option>
														
															
														
										
									<?php
									$result = $conexion->query("SELECT id_area, area_description FROM area ");
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) { 
											echo '<option value="'.$row['id_area'].'">'.$row['area_description'].'</option>';
										}
									}
									?>
			</select>
            </div>
            </div>

			<div class="col-md-3">
            <label class="labeltittle">Colaborador</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-user"></i></span>
            <select class="form-select" name="coworker" id="coworker" title="Clase">
														<option selected value=""></option>
														
															
														
													
													
			</select>
            </div>
            </div>

            <div class="col-md-3">
            <label class="labeltittle">Fecha Inicio</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-calendar"></i></span>
            <input type="date" class="form-control" name="registration" id="registration" title="Fecha Inicio" >
            </div>
            </div>


            <div class="col-md-3">
            <label class="labeltittle">Fecha de Finalizacion</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-calendar"></i></span>
            <input type="date" class="form-control" name="finish" id="finish" value="" title="Fecha de Finalizacion" >
            </div>
            </div>


            <div class="col-md-6">
            <label class="labeltittle">Descripcion</label>
            <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>

            <div class="col-md-3">
            <label class="labeltittle">Completado</label>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="status">
            
            </div>
            </div>


            

            
    </div>


    </br>

    <div class="d-grid gap-2 col-4 mx-auto">
            
                        <button id="btnSave" name="btnSave" type="button" class="btn btn-primary" >
                            Save
                        </button>
                        
    </div>

</form>

            


</div>


<br>


<footer>
   
   <p style="text-align:center "> <strong><i class="fas fa-laptop-code"> </i> Miguel Valle</strong></p>
   <p style="text-align:center "> <strong>made with     &#128147</strong></p>

</footer>



<script language="javascript"src="./js/EditTask.js"></script>
</body>
</html>