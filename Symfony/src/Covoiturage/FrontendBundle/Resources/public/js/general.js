jQuery(document).ready(function() {

    $('#annonce_idPays').on('change',function(){
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/covoiturage/Symfony/web/app_dev.php/list/gouvernorats",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#annonce_idGouvernorat').parent().html(resultOption[0]);
                /*$('select#annonce_idGouvernorat').chosen({
                    disable_search_threshold: 10
                });*/
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
    $('#annonce_idGouvernorat').on('change',function(){alert("--");
        $('#annonce_idDelegation').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/covoiturage/Symfony/web/app_dev.php/list/delegations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#annonce_idDelegation').parent().html(resultOption[0]);
                $('#annonce_idDelegation').parent().css("display","block");
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
    $('#annonce_idDelegation').on('change',function(){alert("**");
        $('#annonce_idLocalite').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/covoiturage/Symfony/web/app_dev.php/list/locations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#annonce_idLocalite').parent().html(resultOption[0]);
                $('#annonce_idLocalite').parent().css("display","block");
                /*$('select#annonce_idLocalite').chosen({
                    disable_search_threshold: 10
                });*/
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
});