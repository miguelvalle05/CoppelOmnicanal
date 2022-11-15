<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
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
<h1 class="labeltopicmain">Home</h1>
<div class="container">



<div class="row">

<div class="d-grid gap-2">



  <button class="btn btn-success" type="button" onClick="redirect(1)">Add Task</button>
  <button class="btn btn-warning" type="button" onClick="redirect(2)">Edit Task</button>
  
</div>


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
<script type="text/javascript">
    function redirect(page)
    {
   
    if(page==1){
        window.location.href="AddTask.php"
    }
    if(page==2){
        window.location.href="TaskSearch.php"
    }
    }
    </script>
</body>
</html>