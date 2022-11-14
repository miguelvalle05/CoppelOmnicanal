<html lang="en">
<head>
<!-- Required meta tags -->
<meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Task</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<link rel="stylesheet" href="./css/sweetalert2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>

<!-- Customized-->
<link rel="STYLESHEET" type="text/css" href="./css/Styles.css"></link>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet"> 
 
</head>

<body>

<?php		
			include("./Functions.php");
            $conexion = conectar();
        

?>
    <h1 class="title has-text-centered">Task</h1>
    
<div class="container">
<form class="row g-3 needs-validation" >


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
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-user"></i></span>
            <select class="form-select" name="coworker" id="coworker" title="Colaborador">
														<option selected value=""></option>
														
															
														
													
													
			</select>
            </div>
            </div>


            <div class="col-md-3">
            <label class="labeltittle">Colaborador</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-user"></i></span>
            <select class="form-select" name="status" id="status" title="Clase">
														<option selected value=""></option>
														
															
														
													
													
			</select>
            </div>
            </div>



			
</form>

       

       <div class="row">
           <div class="col-lg-12">
            <table id="dt_task" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Descripcion</th>
                    <th></th>
                    
                   
                 
                </thead>
                <tbody>
                  
                  
                  
                </tbody>
            </table>
           </div>
       </div> 

       
       <p class="title is-4 is-spaced">Reporte:</p>
     
            <div class="control">
               <button id="btnReport" name="btnReport"class="button is-success is-light">GENERAR EXCEL</button>
            </div>


            <div class="field is-grouped">
            <span class="man" name="report" id="report">

            
							
							<?php echo $_POST['report'];?><?php echo $_POST['report'];?>
						
			</span>	

            </div>

            
     


        

     


</div>
<!--The modal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Editar Tarea </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        			</button>
                </div>
                <div class="modal-body">

        
                    
                </div>
                
            </div>
        </div>
</div>



<footer>
   
   <p style="text-align:center "> <strong><i class="fas fa-laptop-code"> </i> Miguel Valle</strong></p>
   <p style="text-align:center "> <strong>made with     &#128147</strong></p>

</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> 
      
<!--    Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>




<script src="./js/sweetalert2.all.js"></script>
<script language="javascript"src="./js/TaskSearch.js"></script>
<script>

    let parameters = []
    let featuresS=[]
    let featuresI=[]
    var attribute_array = []
    var attributev_array = []
    var EquipmentTable=[]
    var Toast= Swal.mixin({

        toast:true,
        position:'top-end',
        showConfirmButton: false,
        timer: 3000

    })


    function removeElement(event, position) {
        event.target.parentElement.remove()
        delete parameters[position]
    }

    const addJsonElement = json => {
        parameters.push(json)
        return parameters.length - 1
    }

    const addJsonElementS = json => {
        featuresS.push(json)
        return featuresS.length - 1
    }

    const addJsonElementI = json => {
        featuresI.push(json)
        return featuresI.length - 1
    }

    function actualizarCod() {
        let codigo = document.getElementById("code").value;
        //Se actualiza en municipio inm
        document.getElementById("codeEdit").value = codigo;
    }


    
	
</script>

    
  </body>
</html>