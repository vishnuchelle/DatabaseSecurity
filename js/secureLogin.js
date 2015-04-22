/**
 * Created by Vishnu Chelle on 3/26/2015.
 */

$(document).ready(function(){

    secNumGenerate();

    function secNumGenerate(){
        $.ajax({
            type: "GET",
            url: "random.php",
            success: function(resp){
                $('#respSecPass').html(resp+"");
            }
        });

        setTimeout(secNumGenerate, 30000);
    }

    //window.setInterval(function(){
    //
    //        // Ajax Call
    //        $.ajax({
    //            type: "GET",
    //            url: "random.php",
    //            success: function(resp){
    //                $('#respSecPass').html(resp+"");
    //            }
    //        });
    //}, 30000);

    $('#secureBtn').click(function(){

        if (($('#userPassword').val() == '') || ($('#securePassword').val() == '')) {
            $('#loginResp').html("Please provide both the passwords");
        } else {

                var hashPassword = CryptoJS.SHA512($('#userPassword').val());
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
                                data: "p=" + hashPassword+"",
                                success: function(resp2){
                                    if($.trim(resp2) == "true"){
                                        $('#loginResp').html("Successfully Logged In");
                                    }else{
                                        $('#loginResp').html("Failed Login");

                                        //call the failed login tracker function to save the failed attempt
                                        $.ajax({
                                            type: "GET",
                                            url: "failedLoginTrack.php"
                                        });//end ajax call

                                    }
                                }
                            });//end AJAX call

                        }
                        else{

                            $('#loginResp').html("Provide latest secure number!");
                        }
                    }
                });//end AJAX call

        }

    });
});