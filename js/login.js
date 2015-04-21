/**
 * Created by Vishnu Chelle on 4/19/2015.
 */

$(document).ready(function(){

    $('#submitBtn').click(function(){

        if ($('#userName').val() == '') {
            $('#response').html("Username cant be null");
        } else {
            // Ajax Call
            $.ajax({
                type: "GET",
                url: "validateUser.php",
                data: "userName=" + $('#userName').val(),
                success: function(resp){
                    if($.trim(resp) === "true"){
                        //$("#add_err").html("right username or password");
                        window.location="secureLogin.html";
                        //$('#response').html("entered true");
                    }
                    else{
                        //$("#add_err").css('display', 'inline', 'important');
                        //$("#add_err").html("<img src='images/alert.png' />Wrong username or password");
                        $('#response').html("Provide a valid Username");
                    }
                }
                });
            }
    });

    $('#regBtn').click(function(){
        window.location="register.html";
    });
});

