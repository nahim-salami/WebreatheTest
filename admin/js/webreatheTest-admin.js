$(document).ready(function(){
    function is_json(data) {
        if (/^[\],:{}\s]*$/.test(data.replace(/\\["\\\/bfnrtu]/g, '@').
                replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
                replace(/(?:^|:|,)(?:\s*\[)+/g, '')))
            return true;
        else
            return false;
    }
   
    let compt = 0
    setInterval(
        function(){
            ++compt;
            var frm_data = new FormData();
            frm_data.append("action", "getModuleData");
            frm_data.append("from", "ajax");
            $.ajax({
                type: 'POST',
                url: ajax.url,
                data: frm_data,
                processData: false,
                contentType: false
            }).done(function (data) {
                let response = {};
                if(is_json(data)) {
                    response = JSON.parse(data);
                    $(".temperature").text(response.temperature + ' °C');
                    $(".vitese").text(response.vitesse + ' Kb/s');
                    $(".send-data").text(response.nombreDonne);
                }
            })
            $(".receive-data").text(compt);
            $('.reload-time').text('1500 ms')
        }, 1500
    )
})