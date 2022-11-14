$(document).ready(function() {


    var equipment_id, fila, equipment_user;

    EquipmentTable = $('#dt_equipment').DataTable({
        "ajax": {
            "url": "TaskRecords.php",
            dom: "Bfrtip",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "codigo" },
            { "data": "eDescription" },
            { "data": "fvDescription" },
            { "defaultContent": "<button type='button' class='btn btn-primary btnEdit'><i class='material-icons'>edit</i></button><button type='button' class='btn btn-danger btnDelete' data-toggle='modal' data-target='#modalEliminar' ><i class='material-icons'>delete</i></button>" }
        ],

        "responsive": true,

        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        }
    });



    $(document).on('click', '.btnEdit', function() {

        //var recipiente = $(this).data("whatever");
        fila = $(this).closest("tr");
        equipment_id = fila.find('td:eq(0)').text(); //capturo el ID	
        equipment_user = fila.find('td:eq(2)').text(); //capturo user	

        $("#modal-title").html("Editar Tarea - " + equipment_user);

        $('.modal-body').load('editequipmentmodal.php?co=' + equipment_id, function() {


            $('#editModal').modal({ show: true });

        });

    });


    $(document).on('click', '.btnDelete', function() {

        //var recipiente = $(this).data("whatever");
        fila = $(this).closest("tr");
        equipment_id = fila.find('td:eq(0)').text(); //capturo el ID	
        equipment_user = fila.find('td:eq(2)').text(); //capturo user	
        // alert(equipment_id)


        Swal.fire({
            title: "¡CONFIRMAR!",
            icon: "warning",
            text: "¿Esta seguro de eliminar el equipo de " + equipment_user + "?",
            showCancelButton: true,
            confirmButtonText: "Si, deseo eliminar",
            cancelButtonText: "Cancelar"

        }).then(resultado => {
            if (resultado.value) {
                $.ajax({
                    url: "DeleteTaskApp.php",
                    type: "post",
                    data: {
                        codigo: equipment_id
                    }
                }).done(function(res) {
                    if (res == 0) {
                        alert("No se elimino")

                    } else {

                        window.EquipmentTable.ajax.reload(null, false);

                        Toast.fire({
                            icon: "success",
                            title: "El equipo se elimino"

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