/**
 * Created by Vishnu Chelle on 4/22/2015.
 */

$(document).ready(function(){

    $('#submitBtn').click(function(){

        if (($('#empID').val() == '')||($('#adminPassword').val() == '')) {
            $('#response').html("Employee ID and Password cant be null");
        } else {
            var hashEmpID = CryptoJS.SHA512($('#empID').val());
            var hashPassword = CryptoJS.SHA512($('#adminPassword').val());

            // Ajax Call
            $.ajax({
                type: "GET",
                url: "php/validateEmployee.php",
                data: "e=" + hashEmpID + "&p=" + hashPassword+"",
                success: function(resp){
                    if($.trim(resp) === "true"){
                        //$('#response').html("Logged in.");
                        window.location="adminterminal.html";
                    }else{
                        $('#response').html(resp);
                    }
                }

            });
        }
    });
});