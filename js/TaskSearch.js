let parameters = []

var statusV = 0

var Toast = Swal.mixin({

toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000

})


const addJsonElement = json => {
    parameters.push(json)
    return parameters.length - 1
}













$(document).ready(function() {

    
// Fetch Records
function fetch(areaS, coworkerS, statusS, opcion) {

    $.ajax({
        url: "TaskRecords.php",
        type: "post",
        data: {
    
            areaS: areaS,
            coworkerS: coworkerS,
            statusS: statusS,
            opcion: opcion,
            otro: ""
    
    
        },
        dataType: "json",
        success: function(data) {
            var i = 1;
            var TaskTable = $('#dt_task').DataTable({
    
                "data": data,
                "responsive": true,
                "columns": [
    
                    { "data": "id_task" },
                    { "data": "user" },
                    { "data": "descripcion" },
    
                    {
                        data: "id_task",
                        render: function(data) {
                            return "<button type='button' class='btn btn-danger btnDelete' data-whatever='" + data + "'><i class=\"fas fa-trash\"></i></button>";
    
                        }
                    }
    
    
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
    
            TaskTable.on("init.dt",function(){
    
                for(i=0;i<TaskTable.rows().count();i++){
    
                    var row= TaskTable.row(i)
                    var statusF=row.data().statusF;
    
                    if(statusF==0){
                        
                        $(row.node()).css("background-color","#F5E6E5")
    
                    }
                    else{
    
                        $(row.node()).css("background-color","#D6F6C8")
    
                        
    
                    }
    
                }
            
            });
    
    
    
    
            
        }
    });
    
    }
    fetch("","","",0);

   



    //AREA
    $("#areaS").change(function() {
        $("#areaS option:selected").each(function() {
            id_area = $(this).val();
            $.post("Area.php", { id_area: id_area,option:1 }, function(data) {
                

                    $("#coworkerS").html(data);

              

            });
        });

        var areaS = $("#areaS").val();
        var coworkerS = $("#coworkerS").val();
        var statusS = $("#statusS").val();
        



        if (areaS == "" && coworkerS == "" && statusS == "" ) {

            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();

            fetch("","","",0);


        } else {
            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();
            fetch(areaS, coworkerS, statusS,1);
        }
    })

    //COWORKER
    $("#coworkerS").change(function() {
        $("#coworkerS option:selected").each(function() {
            id_coworker = $(this).val();
            
        });

        var areaS = $("#areaS").val();
        var coworkerS = $("#coworkerS").val();
        var statusS = $("#statusS").val();
        



        if (areaS == "" && coworkerS == "" && statusS == "" ) {

            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();

            fetch("","","",0);


        } else {
            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();
            fetch(areaS, coworkerS, statusS,1);
        }
    })

    //STATUS
    $("#statusS").change(function() {

        var areaS = $("#areaS").val();
        var coworkerS = $("#coworkerS").val();
        var statusS = $("#statusS").val();
        



        if (areaS == "" && coworkerS == "" && statusS == "" ) {

            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();

            fetch("","","",0);


        } else {
            $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();
            fetch(areaS, coworkerS, statusS,1);
        }
       
    })



   


    //DELETE
    $(document).on('click', '.btnDelete', function() {

        var recipiente = $(this).data("whatever");


        Swal.fire({
            title: "¡CONFIRMAR!",
            icon: "warning",
            text: "¿Esta seguro de eliminar la tarea " + recipiente + "?",
            showCancelButton: true,
            confirmButtonText: "Si, deseo eliminar",
            cancelButtonText: "Cancelar"

        }).then(resultado => {
            if (resultado.value) {
                $.ajax({
                    url: "DeleteTaskApp.php",
                    type: "post",
                    data: {
                        task: recipiente
                    }
                }).done(function(res) {
                    if (res == 0) {
                        alert("No se elimino")

                    } else {

                        $('#dt_task').DataTable().clear().draw();
            $('#dt_task').DataTable().destroy();

            fetch("","","",0);


                        Toast.fire({
                            icon: "success",
                            title: "La tarea se elimino"

                        })

                    }
                });







            }


        })



    });


     //HOME
     $(document).on('click', '#btnHome', function() {

       
        window.location.href = "http://localhost/coppelomnicanal/Home.php";

    })








    $("#btnReport").click(function() {

       

        $.post("TaskReport.php", { area: $("#areaS").val(), user:$("#coworkerS").val(), status:$("#statusS").val()}, function(data) {

            $("#report").html(data);


        });






    });


});