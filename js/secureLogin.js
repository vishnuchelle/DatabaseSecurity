/**
 * Created by Vishnu Chelle on 4/19/2015.
 */

$(document).ready(function(){

        setInterval(function(){
            //code goes here that will be run every 5 seconds.

            // Ajax Call
            $.ajax({
                type: "GET",
                url: "random.php",
                success: function(resp){
                    $('#respSecPass').html(resp+"");
                }
            });
        }, 30000);

    $('#secureBtn').click(function(){

        if (($('#userPassword').val() == '') && ($('#securePassword').val() == '')) {
            $('#loginResp').html("Please provide both the passwords");
        } else {
            // Ajax Call
            $.ajax({
                type: "GET",
                url: "validateSecureNum.php",
                data: "sN=" + $('#securePassword').val(),
                success: function(resp1){
                    if($.trim(resp1) == "true"){

                            $.ajax({
                                type: "GET",
                                url: "validatePass.php",
                                data: "p=" + $('#userPassword').val(),
                                success: function(resp2){
                                    if($.trim(resp2) == "true"){
                                        $('#loginResp').html("Successfully Logged In");
                                    }else{
                                        $('#loginResp').html("Failed Login");
                                    }
                                }
                            });

                        //window.location="secureLogin.html";
                        //$('#response').html("entered true");
                    }
                    else{
                        //$("#add_err").css('display', 'inline', 'important');
                        //$("#add_err").html("<img src='images/alert.png' />Wrong username or password");
                        $('#loginResp').html("Failed Login");
                    }
                }
            });
        }

    });
});