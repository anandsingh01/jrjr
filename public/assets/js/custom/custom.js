$(document).ready(function () {
    $('[name="raising_for_someone_else"]').change(function () {
        if ($('[name="raising_for_someone_else"]:checked').is(":checked")) {
            $('.patient_details_form').show();
        } else {
            $('.patient_details_form').hide();
        }
    });
});