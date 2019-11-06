$(document).ready(function() {
    function formatState (state) {
        if (!state.id) {
          return state.text;
        }
        var baseUrl = "client_assets/img/testimonial";
        var $state = $(
          '<div><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + '<span class="ml-5">'+ state.text +'</span>' + '</div>'
        );
        return $state;
      };
      
    $(".services").select2({
        templateResult: formatState
    });
    $(".staff").select2({
        templateResult: formatState
    });
    $('.datepicker').datepicker();
});