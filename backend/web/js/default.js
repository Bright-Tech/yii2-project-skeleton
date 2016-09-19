/**
 * Created by SamXiao on 16/9/19.
 */
jQuery(document).ready(function () {
    $(document).on('close.ace.widget', '.form-widget-box', function (event) {
        $(this).slideUp();
        event.preventDefault();
    });
    $("#create-admin").on('click', function () {
        var target = $(this).data('target');
        $('#' + target).slideDown();
    });
});