//ejercicio1.js
function validar(){

  //var input = document.getElementById('id');
  var input = $('#nombre');

  console.log(input);

  if(input.val() != ''){
    console.log(input.val());
  }else{
    console.log('Vacío');
    //input.style.border = '1px solid red';
    input.css('border', '1px solid red');
  }

}

function validar_campos() {
  var correo =$("#correo");
  var contraseña =$("#contraseña");
  //$("input[name='correo']")
  var continuar = true;

  if(correo.val().indexOf("@")!= -1){
    console.log("Enviar");
    correo.css("border","1px solid #ccc");
    correo.css("background-color","#fff");
    //correo.style.backgroundColor="#fff";

  }else{
    console.log("No enviar");
    continuar=false;
    correo.css("border","1px solid red");
    correo.css("background-color","#fdf7f9");
    //correo.style.backgroundColor="#fdf7f9";
  }

  if(contraseña.val() !=""){
    console.log("Enviar");
    correo.css("border","1px solid #ccc");
    correo.css("background-color","#fff");
  }else{
    console.log("No enviar");
    continuar=false;
    contraseña.css("border","1px solid red");
    contraseña.css("background-color","#fdf7f9");
  }
  if(!continuar){
    var alerta=$(".alert").css("display","block");
  }
  return continuar;
}
