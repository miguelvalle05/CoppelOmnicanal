$(document).ready(function() {


    var equipment_id, fila, equipment_user;

    // Fetch Records
    function fetch(area, user, status, opcion) {

        $.ajax({
            url: "TaskRecords.php",
            type: "post",
            data: {

                area: area,
                user: user,
                status: status,
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
                                return "<button type='button' class='btn btn-primary btnEdit'  data-whatever='" + data + "'><i class='material-icons'>edit</i></button><button type='button' class='btn btn-danger btnDelete' data-whatever='" + data + "'><i class='material-icons'>delete</i></button>";

                            }
                        },

                        {
                            data: "id_task",
                            render: function(data) {
                                return "<button type='button' id='imgp' class='sinborde' data-whatever='" + data + "'><img class='zoom_manija' src='../../../programas/imagenes/fotos/" + data + ".jpg'   width='500' ></button>";

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
    fetch();




    $(document).on('click', '.btnEdit', function() {

        var recipiente = $(this).data("whatever");

        $("#modal-title").html("Editar Tarea - " + recipiente);

        $('.modal-body').load('EditTask.php?id_task=' + recipeinte, function() {


            $('#editModal').modal({ show: true });

        });

    });


    $(document).on('click', '.btnDelete', function() {

        var recipiente = $(this).data("whatever");


        Swal.fire({
            title: "¡CONFIRMAR!",
            icon: "warning",
            text: "¿Esta seguro de eliminar la tarea" + recipiente + "?",
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