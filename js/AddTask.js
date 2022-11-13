var Toast = Swal.mixin({

    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

})

let parameters = []



function removeElement(event, position) {
    event.target.parentElement.remove()
    delete parameters[position]
    
   
}

const addJsonElement = json => {
    parameters.push(json)
    return parameters.length-1
   
 
}


var date = new Date(); //Fecha actual
var month = date.getMonth()+1; //obteniendo mes
var day = date.getDate(); //obteniendo dia
var year = date.getFullYear(); //obteniendo año
if(day<10)
  day='0'+day; //agrega cero si el menor de 10
if(month<10)
  month='0'+month //agrega cero si el menor de 10
document.getElementById('registration').value=year+"-"+month+"-"+day;






$(document).ready(function() {


    
    

    

    const $form = document.getElementById("frmGeneral")
    const $divElements = document.getElementById("divElements")
    const $btnSave = document.getElementById("btnSave")
    const $btnHome = document.getElementById("btnHome")
    const $btnAdd= document.getElementById("btnAdd")
    document.getElementById("registration").disabled = true
    document.getElementById("finish").disabled = true
    document.getElementById("btnSave").style.display = 'none'; // hide



    const templateElement = (data, position) => {
        return (`
            <button class="delete" onclick="removeElement(event, ${position})"></button>
            <strong>TASK - </strong> ${data}
        `)
    }

    

   

    //AREA
    $("#area").change(function() {
        $("#area option:selected").each(function() {
            id_area = $(this).val();
            $.post("Area.php", { id_area: id_area }, function(data) {
                $("#coworker").html(data);

            });
        });
    })

   

 


   

   





    //SAVE
    $btnSave.addEventListener("click", (event) => {
        alert(parameters.length)

        if (parameters.length!=0) {


            Swal.fire({
                title: "¡CONFIRMAR!",
                icon: "warning",
                text: "¿Esta seguro de que desea agregar la Tarea?",
                showCancelButton: true,
                confirmButtonText: "Si, deseo agregar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {
                if (resultado.value) {

                    parameters = parameters.filter(el => el != null)



                    var str_json = ` ${JSON.stringify(parameters)}`
                    
                    alert(str_json)


                    

                } else {



                }


            })




        } else {
            alert("Agrega almenos una Tarea")
        }






    })


    //HOME
    $btnHome.addEventListener("click", (event) => {

       
        window.location.href = "http://localhost/coppel/Home.php";

    })



    //ADD
    $btnAdd.addEventListener("click", (event) => {


        if ($form.area.value != "" && $form.coworker.value != "" && $form.description.value != "") {
            let index = addJsonElement({


                area: $form.area.value,
                coworker: $form.coworker.value,
                registration: $form.registration.value,
                finish: $form.finish.value,
                description: $form.description.value,
                status: $form.status.value,



            })

            const $div = document.createElement("div")
            $div.classList.add("notification", "is-link", "is-light", "py-2", "my-1")
            
            $div.innerHTML = templateElement(`
            ${$form.area.options[area.selectedIndex].text}: 
            ${$form.coworker.options[coworker.selectedIndex].text} 
            <br>
            ${$form.description.value}
            <br>
            Inicio: ${$form.registration.value} Final: Por Definir`, index)

          
            $divElements.insertBefore($div, $divElements.firstChild)


            document.getElementById("btnSave").style.display = ''; // Show

        } else {

            alert("Completa los campos")
         
            



        }

       
        

    })





     //HOME
     $btnHome.addEventListener("click", (event) => {

       
        window.location.href = "http://localhost/coppel/Home.php";

    })










});