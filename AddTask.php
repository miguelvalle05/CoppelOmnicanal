<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task </title>
    <link rel="stylesheet" href="./css/Styles.css">
    <link rel="stylesheet" href="./css/sweetalert2.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
   	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php		
		include("./Functions.php");
	    $conexion = conectar();
	

?>
<h1 class="labeltopicmain">Task</h1>
<div class="container">


    <form action="" id="frmGeneral" name="frmGeneral" method="POST" >


    <div class="row">


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
            <span class="input-group-text" id="basic-addon1">  <i class="fas fa-list"></i></span>
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

            <div class="col-md-3">
            <label class="labeltittle"></label>
            <button id="btnAdd" name="btnAdd" type="button" class="btn btn-danger" >
							<span class="icon">
								<i class="fas fa-plus"></i>
							</span>
			</button>

            </div>


            
    </div>


    </br>
    
	<div id="divElements">

    </div>		
          

   
    </br>

    <div class="d-grid gap-2 col-4 mx-auto">
            
                        <button id="btnSave" name="btnSave" type="button" class="btn btn-primary" >
                            Save
                        </button>
                        <button id="btnHome" name="btnHome" type="button" class="btn btn-success" >
                        <i class="fas fa-home"></i>
                        </button>
    </div>

    
        
        

    </form>

            


</div>


<br>


<footer>
   
   <p style="text-align:center "> <strong><i class="fas fa-laptop-code"> </i> Miguel Valle</strong></p>
   <p style="text-align:center "> <strong>made with     &#128147</strong></p>

</footer>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>



<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="./js/sweetalert2.all.js"></script>
<script language="javascript"src="./js/AddTask.js"></script>
</body>
</html>