/**
 * Created by Vishnu Chelle on 4/22/2015.
 */

$(document).ready(function(){

    $('#createBtn').click(function(){

        if(($('#userName').val()=='') || ($('#branchCode option:selected').val()=='')||
            ($('#accType option:selected').val()=='')){

            $('#response').html("'Username','Account Type','Branch Code' are mandatory fields!");

        }else {

            if (($('#accBalance').val() == '')) {
                var accBalance = 0;
            } else {
                var accBalance = $('#accBalance').val();
            }

            var userName = $('#userName').val();
            var branchCode = $('#branchCode option:selected').val();
            var accType = $('#accType option:selected').val();


            // Ajax Call
            $.ajax({
                type: "GET",
                url: "php/createAccount.php",
                data: "u=" + userName + "&b=" + branchCode + "&at=" + accType + "&bal=" + accBalance + "",
                success: function (resp) {
                    if ($.trim(resp) === "true") {
                        //$('#response').html("Account Created");
                        window.location = "adminterminal.html";
                    } else {
                        $('#response').html(resp);
                    }
                }

            });
        }


    });
});

