var Toast = Swal.mixin({

    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

})



let parameters = []

var statusV=0



const addJsonElement = json => {
    parameters.push(json)
    
}








$(document).ready(function() {


    const $form = document.getElementById("frmGeneral")
    const $btnSave = document.getElementById("btnSave")
    const $btnHome = document.getElementById("btnHome")
    document.getElementById("registration").disabled = true
    document.getElementById("finish").disabled = true
    document.getElementById("status").disabled = true
    document.getElementById("area").disabled = true
    document.getElementById("coworker").disabled = true
    document.getElementById("btnSave").style.display = 'none'; // hide



   
    

   

    //AREA
    $("#area").change(function() {
        $("#area option:selected").each(function() {
            id_area = $(this).val();
            $.post("Area.php", { id_area: id_area }, function(data) {
                if(datas.length!=0){

                    $("#coworker").html(data);

                    $("#coworker").val(datas[0].id_user);

                }

                else{

                    $("#coworker").html(data);
                    
                }
                
                datas = [];

            });
        });
    })

    //STATUS
    $("#status").change(function() {
        if( $(this).is(':checked') ) {
            statusV=1;

            
            var date = new Date(); //Fecha actual
            var month = date.getMonth()+1; //obteniendo mes
            var day = date.getDate(); //obteniendo dia
            var year = date.getFullYear(); //obteniendo año
            if(day<10)
            day='0'+day; //agrega cero si el menor de 10
            if(month<10)
            month='0'+month //agrega cero si el menor de 10
            document.getElementById('finish').value=year+"-"+month+"-"+day;
            
        } 
        else {
    
            statusV=0;
            $("#finish").val("0000-00-00");
            
           
        }
    })

     //TASK

     $("#task").change(function() {
        $("#task").each(function() {
            taskV = $(this).val();

            $.ajax({
                url: "ValidateTask.php",
                type: "post",
                data: {
                    taskV: taskV
                }
            }).done(function(res) {
                if (res == 0) {
                    alert("TASK Inexistente")
                    $("#task").val(null);
                } else {

                    document.getElementById("task").disabled = true
                    document.getElementById("area").disabled = false
                    document.getElementById("coworker").disabled = false
                    document.getElementById("status").disabled = false
                    document.getElementById("btnSave").style.display = ''; // show
                    
                                


                    resultado = JSON.parse(res);
                    datas = resultado["app"];

                    
                    $("#area").val(datas[0].id_area);
                    $("#area").change();
                    $("#registration").val(datas[0].registration_date);
                    $("#finish").val(datas[0].finish_date);
                    $("#description").val(datas[0].task_description);

                    
                   
                    

                    if(datas[0].status==1){


                        document.querySelector('#status').checked = true;
                        statusV=1;




                    }

                


                    

                }

            });

        });
    })


   




    //SAVE
    $btnSave.addEventListener("click", (event) => {


        if ($form.task.value != "" && $form.area.value != "" && $form.coworker.value != "") {


            Swal.fire({
                title: "¡CONFIRMAR!",
                icon: "warning",
                text: "¿Esta seguro de que desea actualizar la tarea "+$form.task.value+"?",
                showCancelButton: true,
                confirmButtonText: "Si, deseo actualizar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {
                if (resultado.value) {

                    addJsonElement({


                        task: $form.task.value,
                        status: statusV,
                        area: $form.area.value,
                        coworker: $form.coworker.value,
                        registration: $form.registration.value,
                        finish: $form.finish.value,
                        description: $form.description.value,
                
                       
                       
                       
    
    
    
                    })

                    parameters = parameters.filter(el => el != null)
                    var str_json = ` ${JSON.stringify(parameters)}`
                    


                    parameters = parameters.filter(el => el != null)
                    var str_json = ` ${JSON.stringify(parameters)}`
                    const request = new XMLHttpRequest()
                    request.open("POST", "EditTaskApp.php")
                    request.setRequestHeader("Content-type", "application/json")
                    request.send(str_json)
                    console.log(str_json)



                    Toast.fire({
                        icon: "success",
                        title: "La tarea se actualizo"

                    })

                   

                    //$form.reset()

                   // window.location.href = "http://localhost/coppelomnicanal/Home.php";

                } else {



                }


            })




        } else {
            alert("Completa los campos de SKU")
        }



       




    })











});