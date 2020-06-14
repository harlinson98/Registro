$(document).ready(function(){
$('#login-admin').on('submit', funcion(e){
 e.preventDefault();

 var datos = $(this).serializeArray();
 $.ajax({
   type: $(this).attr('method'),
   data: datos,
   url: $(this).attr('action'),
   dataType: 'json',
   success: funtion(data){
     console.log(data);
  console.log(data);
  var resultado = data;
  if(resultado.respuesta == 'exito'){
    swal(
      'Login Correcto',
      'Bienvenido'+resultado.usuario+'!!',
      'success'
    )
    seTimeout(function(){
      window.location.href = 'admin-area.php';
    }, 2000);
  }else{
    swal(
      'Oopss...',
      'Usuario o password incorecto!',
      'error'
    )
  }

   }
 });

});
});
