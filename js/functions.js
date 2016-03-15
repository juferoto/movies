function toggleAndClean(divShow, divHide)
{
    $('#'+divHide).hide();
    $('#'+divShow).show();
    $('#'+divHide).html('');
}


function addMessageProcess()
{
    titleMess = "Procesando";
    $.blockUI({ css: {
            'border-top-left-radius': '10px',
            'border-top-right-radius': '10px',
            'border-bottom-right-radius': '10px',
            'border-bottom-left-radius': '10px',
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            width: 'auto',
            left: 'calc(50% - 97px)',
            top: 'calc(50% - 97px)',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            color: '#fff'
        },
        message: '<div><div><h3><i class="glyphicon glyphicon-refresh"></i><br>'+titleMess+'....</h3></div></div>'
    });
}

function getActors(formId, divShow, divHide)
{
    var data  = $('#'+formId).serializeArray();
    $.ajax({
        type: "POST",
        url: "controller/ActionMovies.php?action=1",
        data: data,
        success: function(json) {
            $.unblockUI();
            var text = json.substring(0, json.length-1);

            // alert(jQuery.parseJSON(json));
            $('#'+divShow).html(text);
            toggleAndClean(divShow, divHide);
        }
    });
}


function getMoviesByActor(idActor, divShow, divHide)
{
    var data  = '&select='+idActor;
    $.ajax({
        type: "POST",
        url: "controller/ActionMovies.php?action=2",
        data: data,
        success: function(json) {
            $.unblockUI();
            var text = json.substring(0, json.length-1);
            $('#'+divShow).html(text);
            $('#'+divShow).show();
            $('#'+divHide).hide();
        }
    });
}
