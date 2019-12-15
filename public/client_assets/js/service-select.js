$(document).ready(function() {

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "upload/images/service";

        var $state = $(
            "<div class=custom_img><img src=" + baseUrl + "/" + state.element.getAttribute('data-image') +
            " class=img-flag /> " + "<span class=ml-3 >" + state.text + "</span>" + "</div>"
        );
        return $state;
    }

    function formatStateUser(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "upload/images/users";

        var $state = $(
            "<div class=custom_img><img src=" + baseUrl + "/" + state.element.getAttribute('data-image') +
            " class=img-flag /> " + "<span class=ml-3 >" + state.text + "</span>" + "</div>"
        );
        return $state;
    }

    $(".services").select2({
        templateResult: formatState,
        maximumSelectionLength: 5,
        minimumResultsForSearch: -1
    });

    $(".staff").select2({
        templateResult: formatStateUser,
        minimumResultsForSearch: -1
    });
    $('.datepicker').datepicker();
});