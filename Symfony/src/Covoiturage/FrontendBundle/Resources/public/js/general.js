jQuery(document).ready(function() {

    $('#search').click(function(){
        var sgov = $('#started_place select.annonce_idGouvernorat').val();
        var sdel = $('#started_place select.annonce_idDelegation').val();
        var sloc = $('#started_place select.annonce_idLocalite').val();
        var agov = $('#arrived_place select.annonce_idGouvernorat').val();
        var adel = $('#arriveded_place select.annonce_idDelegation').val();
        var aloc = $('#arrived_place select.annonce_idLocalite').val();
        var horaire = $('#horaire').val();
        var nbPlace = $('#nbPlace').val();
        var params ='?';

        if( sloc != null && sloc !='')
            params += '&sloc='+sloc;
        else if( sdel != null && sdel !='')
            params += '&sdel='+sdel;
        else if( sgov != null && sgov != '')
            params += '&sgov='+sgov;

        if( aloc != null && aloc !='')
            params += '&aloc='+aloc;
        else if( adel != null && adel !='')
            params += '&adel='+adel;
        else if( agov != null && agov != '')
            params += '&agov='+agov;

        if( horaire != null)
            params += '&horaire='+horaire;
        if( nbPlace != null)
            params += '&nbPlace='+nbPlace;

        location.href = '/search'+params;
        return false;
    });

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
        $('#started_place .annonce_idLocalite').parent().css("display","none");
        $('#started_place .annonce_idDelegation').html('');
        $('#started_place .annonce_idLocalite').html('');
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
        $('#arrived_place .annonce_idLocalite').parent().css("display","none");
        $('#arrived_place .annonce_idDelegation').html('');
        $('#arrived_place .annonce_idLocalite').html('');
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