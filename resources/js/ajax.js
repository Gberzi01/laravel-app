$(document).ready(function(){
    $("#email").change(function(){
        let email = $("#email").val();
        let token = $('meta[name="csrf-token"]').attr('content');
        console.log(email);
        $.ajax({
            type: 'POST',
            url: '/check_email',
            data: {
                '_token': token,
                'email': email,
            },
            success: function(data) {
                if (data.taken) {
                    $(".username-taken").show();
                } else {
                    $(".username-taken").hide();
                }
            }
        });
    });
});
