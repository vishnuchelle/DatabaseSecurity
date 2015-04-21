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

                        // Ajax Call
                        $.ajax({
                            type: "GET",
                            url: "bruteCheck.php",
                            success: function(lockStatus){
                                if($.trim(lockStatus)=== "false"){
                                    //Account is locked. Please try after one hour.
                                    $('#response').html("Account is locked. Please try after one hour!");
                                }else{
                                    //Proceed to secure page
                                    window.location="secureLogin.html";
                                    //$('#response').html("Not locked.");
                                }
                            }
                        });//end AJAX call

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

