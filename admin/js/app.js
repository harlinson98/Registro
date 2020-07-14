$(document).ready(function () {
  $('.sidebar-menu').tree()
  $('#registros').DataTable({
    'paging'      : true,
    'pageLength':10,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false,
    'language' : {
      paginate:{
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Último',
        first: 'Primero'
      },
      info: 'Mostrando _STRART_ a _END_ de _TOTAL_ resultados',
      emptyTable: 'No hay registros',
      infoEmpty: '0 Registros',
      search: 'Buscar: '
    }
  });

    $('#crear_registro_admin').attr('disable', true);
    $('#repetir_password').on('input', function(){
      var password_nuevo = $('#password').val();
      if($(this).val() == password_nuevo){
        $('#resultado_password').text('correcto');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disable', false);
     }else{
       $('#resultado_password').text('no son iguales!');
       $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
       $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      }
    });
});
//Date picker
  $('#Fecha').datepicker({
    autoclose: true
  });
//select2
    $('.seleccionar').select2();

    //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  });
