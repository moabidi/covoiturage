jQuery(document).ready(function() {

    $('#annonce_idPays').on('change',function(){
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/clist/gouvernorats",
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
    $('body').delegate('#started_place select.annonce_idGouvernorat','change',function(){
        $('#started_place .annonce_idDelegation').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/list/delegations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#started_place .annonce_idDelegation').parent().html(resultOption[0]);
                $('#started_place .annonce_idDelegation').parent().css("display","block");
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
    $('body').delegate('#started_place select.annonce_idDelegation','change',function(){
        $('#started_place .annonce_idLocalite').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/list/locations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#started_place .annonce_idLocalite').parent().html(resultOption[0]);
                $('#started_place .annonce_idLocalite').parent().css("display","block");
                /*$('select#annonce_idLocalite').chosen({
                    disable_search_threshold: 10
                });*/
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });

    $('body').delegate('#arrived_place select.annonce_idGouvernorat','change',function(){
        $('#arrived_place .annonce_idDelegation').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/list/delegations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#arrived_place .annonce_idDelegation').parent().html(resultOption[0]);
                $('#arrived_place .annonce_idDelegation').parent().css("display","block");
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
    $('body').delegate('#arrived_place select.annonce_idDelegation','change',function(){
        $('#arrived_place .annonce_idLocalite').parent().css("display","none");
        var select = $(this);
        var idPays = select.val();
        var xmlRquest = $.ajax({
            type: "post",
            url: "/list/locations",
            data: {idPays: idPays}
        });
        xmlRquest.done(function(msg){
            var patt1 = /(<select)+(.)+(<\/select>)+/i;
            var resultOption = msg.match(patt1);
            if( resultOption){
                $('#arrived_place .annonce_idLocalite').parent().html(resultOption[0]);
                $('#arrived_place .annonce_idLocalite').parent().css("display","block");
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