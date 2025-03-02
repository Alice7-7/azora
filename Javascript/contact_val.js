


    $(function() {
        
    $('#contact_form').submit(function(event) {
        event.preventDefault();


        $('#loading').css('display','flex');

        $.ajax({

            url: 'contact_val.php',
            type: 'POST',
            data: $(this).serialize(),

            success: function(response) {

                let responseArray = response.split("|");
                let message = responseArray[0];
                let newToken = responseArray[1];

                if (message === 'Message sent successfully') {      

                    $('#success_msg').text(message).css('display','flex');

                    $('#contact_form input').val('');
                    $('#contact_form textarea').val('');

                    setTimeout(function() {
                        $('#success_msg').hide();
                    }, 7000);

                    $('#csrf_token').val(newToken);

                } else {

                    $('#error_msg').text(message).css('display','flex');

                    setTimeout(function() {
                        $('#error_msg').hide();
                    }, 5000);

                }
            },

            error: function() {

                $('#error_msg').text('Error sending message. Please try again later.').css('display','flex');

                setTimeout(function() {
                    $('#error_msg').hide();
                }, 5000);

            },

            complete: function() {

                $('#loading').hide();
            }

        });
    });
});

document.getElementById('ph_no').addEventListener('input', function(event) {
    this.value = this.value.replace(/[^\+\-0-9]/g, '');
});

