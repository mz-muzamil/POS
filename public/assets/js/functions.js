$(document).ready(function(){
  alertify.defaults.transition = "slide";
  alertify.defaults.theme.ok = "btn btn-primary";
  alertify.defaults.theme.cancel = "btn btn-secondary";
  alertify.defaults.theme.input = "form-control";


  $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
  });

});