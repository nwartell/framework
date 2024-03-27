$(document).ready(function() {
    $('#register_form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var username = $('#username').val();
        var password = $('#password').val();
        var password_ver = $('#password_ver').val();

        $.ajax({
            type: 'POST',
            url: 'register_handler.php',
            data: { username: username, password: password, password_ver: password_ver },
            success: function(response) {
                $('#message').html(response);
            }
        });
    });
});