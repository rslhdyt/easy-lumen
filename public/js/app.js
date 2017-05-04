$.ajaxSetup({
    beforeSend: function (xhr)
    {
        var token = Cookies.get('api-token', null);
        xhr.setRequestHeader("api-token", token);
    }
});

$(document).ready(function(){
    $('.overlay').hide();

    $('.main-layout').layout('resize', {height: $(window).height()});
}).ajaxError(function(event, jqxhr, settings, thrownError) {
    if (jqxhr.status == 422) {
        var message = '';

        $.each(jqxhr.responseJSON.errors, function(key, error){
            message += '<p>' + error + '</p>';
        });

        $.messager.alert({
            title: 'Error Validation',
            msg: message
        });
    } else if (jqxhr.status == 401) {
        window.location = App.siteUrl + '/p/users/login';
    } else if (jqxhr.status == 500) {
        $("#log").text( "Server error, call administrator." );
    }
});