$(document).ajaxStart(function() { Pace.restart(); });

function initDashboard()
{
    initIronside();

    $(".select2").select2();
    $('[data-toggle="tooltip"]').tooltip();
}
