(function() {
  "use strict";

    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function(){
     var map = L.map('mapa').setView([7.917453, -72.508054], 15);

   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
   }).addTo(map);

   L.marker([7.917453, -72.508054]).addTo(map)
       .bindPopup('Entradas a la venta.')
       .openPopup();

     //  DAtos usuarios
  var nombre = document.getElementById('nombre');
  var apellido = document.getElementById('apellido');
  var email = document.getElementById('email');

    //campos pases
   var pase_dia = document.getElementById('pase_dia');
   var pase_dosdias = document.getElementById('pase_dosdias');
   var pase_completo = document.getElementById('pase_completo');

   //botones y divs
   var calcular = document.getElementById('calcular');
   var errorDiv = document.getElementById('error');
   var botonRegistro = document.getElementById('btnRegistro');
   var lista_productos = document.getElementById('Lista-productos');
   var suma = document.getElementById('suma-total');
//Extras
   var camisas = document.getElementById('camisa_evento');
   var etiquetas = document.getElementById('etiquetas');

  botonRegistro.disabled  = true;

 if(document.getElementById('calcular')){

   calcular.addEventListener('click', calcularMontos);

   pase_dia.addEventListener('blur', mostrarDias);
   pase_dosdias.addEventListener('blur', mostrarDias);
   pase_completo.addEventListener('blur', mostrarDias);

   nombre.addEventListener('blur', validarCampos);
   apellido.addEventListener('blur', validarCampos);
   email.addEventListener('blur', validarCampos);
   email.addEventListener('blur', validarMail);
     function validarCampos(){
       if(this.value == ''){
         errorDiv.style.display = 'block';
         errorDiv.innerHTML ="este campo es obligatorio";
         this.style.border = '1px solid red';
         errorDiv.style.border = '1px solid red';
       }else{
         errorDiv.style.display = 'none';
         this.style.border = '1px solid #cccccc';
       }
     }

       function validarMail(){
         if(this.value.indexOf("@") > -1){
           errorDiv.style.display = 'none';
           this.style.border = '1px solid #cccccc';
         }else{
           errorDiv.style.display= 'block';
           errorDiv.innerHTML ="debe tener almenos una @";
           this.style.border = '1px solid red';
           errorDiv.style.border = '1px solid red';
         }
       }

   function calcularMontos(event){//no reconoce al dar click.
     event.preventDefault();
      //console.log("has hecho click");

     console.log("has hecho click en clacular");
   }
     function mostrarDias(){
       var boletosDia = parseInt(pase_dia.value, 10 )|| 0,
           boletos2Dias = parseInt(pase_dosdias.value, 10) ||0,
           boletoCompleto = parseInt(pase_completo.value, 10) || 0;

           var diasElegidos = [];
           if(boletosDia > 0){
             diasElegidos.push('viernes');
           }
           if(boletos2Dias > 0){
             diasElegidos.push('viernes', 'sabado');
           }
           if(boletoCompleto > 0){
             diasElegidos.push('viernes', 'sabado', 'domingo');
           }
           for(var i = 0; i < diasElegidos.length; i++){
             document.getElementById(diasElegidos[i]).style.display = 'block';
           }
     }
   }
    }); //DOM CONTENT LOADED
})();


$(function(){

  //lettering
$('.nombre-sitio').lettering();

//agregar clase a menú

$('body.Conferencia .navegacion-principal a:contains("conferencia")').addClass('activo');
$('body.Calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
$('body.Invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
 // Menu Fijo
   var windowHeight = $(window).height();
   var barraAltura = $('.barra').innerHeight();

   $(window).scroll(function(){
     var scroll = $(window).scrollTop();
     if(scroll > windowHeight){
       $('.barra').addClass('fixed');
       $('body').css({'margin-top': barraAltura+'px'});
     }
     else {
       $('.barra').removeClass('fixed');
       $('body').css({'margin-top':'0px'});
     }
   });

   // Menu Responsive
   $('.menu-movil').on('click', function(){
      $('.navegacion-principal').slideToggle();
   });
  // programa de Conferencias
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function() {
    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    $('.ocultar').hide();
    var enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);
    return false;
  });

  //animacion para los numeros
  $('.resumen-evento li:nth-child(1) p').animateNumber({number:6}, 2000);
  $('.resumen-evento li:nth-child(2) p').animateNumber({number:15}, 1200);
  $('.resumen-evento li:nth-child(3) p').animateNumber({number:3}, 1200);
  $('.resumen-evento li:nth-child(4) p').animateNumber({number:9}, 1200);


// cuenta regresiva
  $('.cuenta-regresiva').countdown('2020/10/08 00:00:00', function(event){
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  });

  //Colorbox

  $('.invitado-info').colorbox({inline:true, width:"50%"});

});
