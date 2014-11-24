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
    $('body').delegate('#list_stations select.annonce_idGouvernorat','change',function(){
        $('#list_stations .annonce_idDelegation').parent().css("display","none");
        $('#list_stations .annonce_idLocalite').parent().css("display","none");
        $('#list_stations .annonce_idDelegation').html('');
        $('#list_stations .annonce_idLocalite').html('');
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
                $('#list_stations .annonce_idDelegation').parent().html(resultOption[0]);
                $('#list_stations .annonce_idDelegation').parent().css("display","block");
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });
    $('body').delegate('#list_stations select.annonce_idDelegation','change',function(){
        $('#list_stations .annonce_idLocalite').parent().css("display","none");
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
                $('#list_stations .annonce_idLocalite').parent().html(resultOption[0]);
                $('#list_stations .annonce_idLocalite').parent().css("display","block");
                /*$('select#annonce_idLocalite').chosen({
                 disable_search_threshold: 10
                 });*/
            }
        });
        xmlRquest.fail(function(jqXHR, textStatus){
            alert("Request failed: " + textStatus);
        });
    });

    /*Start add stations*/
    $("#register_station").click(function(){
        if( $("#list_stations select.annonce_idGouvernorat").val() == '' ){
            alert("Vous devez choisir la ville de cette station");
        }else{
            var gov = $("#list_stations select.annonce_idGouvernorat").val();
            var del = $("#list_stations select.annonce_idDelegation").val();
            var loc = $("#list_stations select.annonce_idLocalite").val();
            var num = $("#sorted_station li").length +1;
            var html = ''
            html +='<li>Station n°'+num+' : - <input type="hidden" name="gouvernorat['+num+']" value="'+gov+'"/>'+ $("#list_stations select.annonce_idGouvernorat option:selected").text();
            if( del != '' )
                html += ' - <input type="hidden" name="delegation['+num+']" value="'+del+'"/>'+ $("#list_stations select.annonce_idDelegation option:selected").text();
            if( loc != '' )
                html += ' - <input type="hidden" name="localite['+num+']" value="'+loc+'"/>'+ $("#list_stations select.annonce_idLocalite option:selected").text();
            html += '</li>'
            $("#sorted_station").append(html);
            $(this).css('display','none');
            $('#add_station').css('display','block');
            $("#list_stations select.annonce_idGouvernorat").val('');
            $("#list_stations select.annonce_idGouvernorat").css('display','none');
            $("#list_stations select.annonce_idDelegation").css('display','none');
            $("#list_stations select.annonce_idLocalite").css('display','none');
        }
    });
    $("#add_station").click(function(){
        $("#list_stations select.annonce_idGouvernorat").css('display','block');
        $(this).css('display','none');
        $('#register_station').css('display','block');
    });


    /*End add stations*/

});