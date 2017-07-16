function turnOnForm() {
    var form = $('#turnOnFormulary'),
        active = 0,
        top = $(window).scrollTop(),
        boton = $('#turnOn');

    form.submit(function(event) {
        event.preventDefault();
        if (active == 0) {
            active = 1;
            data = form.serialize();
            $.ajax({
                url: '/hk/forms/emulator/turnOn',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $('#forerror').html('<div class="loader_error"></div>');
                    boton.attr('disabled', true);
                },
                success: function(error) {
                    $('#forerror').html(' ');
                    if (error.indexOf('exitosamente') == -1) {
                        demo.showNotification('top','right', error, 'danger', 'error');
                    } 

                    if (error.indexOf('exitosamente') != -1) {
                        demo.showNotification('top','right', error, 'success', 'check');
                    }

                    setTimeout(function () {
                        active = 0;
                        boton.attr('disabled', false);
                    }, 500);
                }
            });
        }
    });
    $('#forerror .alert button[data-dismiss="alert"]').click(function(event) {
        event.preventDefault();
        $('#forerror').hide('blind', 300);
    });
}

function sendCommandForm() {
    var form = $('#sendCommandFormulary'),
        active = 0,
        top = $(window).scrollTop(),
        boton = $('#sendCommand');

    form.submit(function(event) {
        event.preventDefault();
        if (active == 0) {
            active = 1;
            data = form.serialize();
            $.ajax({
                url: '/hk/forms/emulator/sendCommand',
                type: 'POST',
                dataType: 'json',
                data: form.serialize(),
                beforeSend: function(){
                    $('#forerror').html('<div class="loader_error"></div>');
                    boton.attr('disabled', true);
                },
                success: function(data) {
                    $('#forerror').html('');
                    var oldData = $('#consoleResponse').html();
                    if (data.error) {
                        $('#consoleResponse').html(oldData + '<p class="error">' + data.error + '</p>');
                    }
                    var oldData = $('#consoleResponse').html();
                    if (data.response) {
                        $('#consoleResponse').html(oldData + '<p class="response">' + data.response + '</p>');
                    }
                    var scroll = $('#consoleResponse').prop('scrollHeight');
                    $('#consoleResponse').scrollTop(scroll);
                    setTimeout(function () {
                        active = 0;
                        boton.attr('disabled', false);
                        document.getElementById('sendCommandFormulary').reset();
                    }, 500);
                }
            });
        }
    });
}

function updateResponse() {
    $.ajax({
        url: '/hk/forms/emulator/sendCommand',
        type: 'POST',
        dataType: 'json'
    })
    .done(function(data) {
        var oldData = $('#consoleResponse').html();
        $('#consoleResponse').html(oldData + data.response);
    })
    .fail(function() {
        console.log("Response > Failed");
    });
    
}

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    matches = [];

    substrRegex = new RegExp(q, 'i');

    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var commands = [
    'update_catalog', 'refresh_catalog', 'refresh_catalogue', 'recache_catalogue', 'reload_catalogue', 'reload_catalog', 'stop', 'shutdown', 'update_items', 'reload_items', 'recache_items', 'refresh_items', 'update_navigator', 'reload_navigator', 'recache_navigator', 'refresh_navigator', 'update_ranks', 'reload_ranks', 'recache_ranks', 'refresh_ranks', 'update_settings', 'reload_settings', 'recache_settings', 'refresh_settings', 'reload_quests', 'update_quests', 'reload_vouchers', 'update_vouchers', 'update_bans', 'reload_bans', 'goto <UserID> <RoomID>', 'reload_last_change <UserID>', 'disconnect <username>', 'givebadge <UserID> <badge>', 'reload_badges <UserID>', 'alert_user <userid> <message>', 'reload_motto <UserID>', 'reload_user_vip <UserID>', 'reload_user_rank <UserID>', 'reload_gotw <UserID>', 'reload_diamonds <UserID>', 'reload_pixels <UserID>', 'reload_credits <UserID>', 'disconnect <UserID>'
];

$(document).ready(function() {
    $('#commandF .typeahead').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'commands',
      source: substringMatcher(commands)
    });
});