var training_change = 'training_change';
var faculty_change  = 'faculty_change';
$(document).ready(function() {
    $(".crstype.all").change( function() {
        $(".crstype").prop('checked', $(this).prop('checked'));
    });
    $(".mattype.all").change( function() {
        $(".mattype").prop('checked', $(this).prop('checked'));
    });

    $(".crstype").change( function() {
        if( ! (
            $("#courses").prop('checked') == $("#exercises").prop('checked') &&
            $("#exams").prop('checked') == $("#exercises").prop('checked')
            ))
            $(".crstype.all").prop('disabled', true);
        else
            $(".crstype.all").prop('disabled', false);
    });
    $(".mattype").change( function() {
        if( ! (
            $("#docs").prop('checked') == $("#imgs").prop('checked') &&
            $("#archives").prop('checked') == $("#imgs").prop('checked')
            ))
            $(".mattype.all").prop('disabled', true);
        else
            $(".mattype.all").prop('disabled', false);
    });
 });

function ConfirmFunction(strWarning, retfunc, params)
{
    $('#confirmModal #notice').html(strWarning);
    //$('#myModal').on('hidden', returnFunction() );
    $('#confirmModal .btn-primary').unbind( "click" );
    $('#confirmModal .btn-primary').click( function() {
        retfunc(params);
        $('#confirmModal').modal('hide');
    } );
    $('#confirmModal').modal('show');
}

