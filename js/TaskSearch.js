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

var equipment_id, fila, equipment_user;

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
        TaskTable = $('#dt_task').DataTable({

            "data": data,
            "responsive": true,
            "columns": [

                { "data": "id_task" },
                { "data": "user" },
                { "data": "descripcion" },

                {
                    data: "id_task",
                    render: function(data) {
                        return "<button type='button' class='btn btn-primary btnEdit'  data-whatever='" + data + "'><i class=\"fas fa-edit\"></i></button><button type='button' class='btn btn-danger btnDelete' data-whatever='" + data + "'><i class=\"fas fa-trash\"></i></button>";

                    }
                }


            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    }
});

}
fetch("","","",0);








$(document).ready(function() {



    //AREA
    $("#areaS").change(function() {
        $("#areaS option:selected").each(function() {
            id_area = $(this).val();
            $.post("Area.php", { id_area: id_area }, function(data) {
                

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
    $("#status").change(function() {
        if ($(this).is(':checked')) {
            statusV = 1;


            var date = new Date(); //Fecha actual
            var month = date.getMonth() + 1; //obteniendo mes
            var day = date.getDate(); //obteniendo dia
            var year = date.getFullYear(); //obteniendo año
            if (day < 10)
                day = '0' + day; //agrega cero si el menor de 10
            if (month < 10)
                month = '0' + month //agrega cero si el menor de 10
            document.getElementById('finish').value = year + "-" + month + "-" + day;

        } else {

            statusV = 0;
            $("#finish").val("0000-00-00");


        }
    })



   


/*TaskTable = $('#dt_task').DataTable({
    "ajax": {
        "url": "TaskRecords.php",
        dom: "Bfrtip",
        "method": 'POST', //usamos el metodo POST
        //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc": ""
    },
    "columns": [
        { "data": "id_task" },
        { "data": "id_user" },
        { "data": "descripcion" },
        {
            "data": "id_task",
            "render": function(data) {
                return "<button type='button' class='btn btn-primary btnEdit'  data-whatever='" + data + "'><i class=\"fas fa-edit\"></i></button><button type='button' class='btn btn-danger btnDelete' data-whatever='" + data + "'><i class=\"fas fa-trash\"></i></button>";

            }
        }



           ],

    "responsive": true,

    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
    }
});
*/




    $(document).on('click', '.btnEdit', function() {

        var recipiente = $(this).data("whatever");

        $("#modal-title").html("Editar Tarea - " + recipiente);

        $('.modal-body').load('EditTask.php?id_task=' + recipiente, function() {


            $('#editModal').modal({ show: true });

        });

    });


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

                        window.TaskTable.ajax.reload(null, false);

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

        if (document.getElementById("equipmentR").value == "") {
            filter = 0
        } else {

            filter = document.getElementById("equipmentR").value


        }

        $.post("equipmentReport.php", { equipmentR: filter }, function(data) {

            $("#report").html(data);


        });




        console.log(filter)

        $.post("serviceEReport.php", { equipmentR: filter }, function(data) {

            $("#serviceReport").html(data);


        });


    });


});