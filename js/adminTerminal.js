/**
 * Created by Vishnu Chelle on 4/22/2015.
 */

$(document).ready(function(){

    function checkUserAccess(){
        var response;
        $.ajax({
            type: "GET",
            async: false,
            url: "php/adminAccess.php",
            success: function(resp){
                //get the response integer
                //$('#response').html(resp+"");
                //return resp+"";
                response = resp;
                //$('#response').html(response+"");
            }
        });
        //$('#response').html(response+"");
        return response+"";

    }

    $('#createUser').click(function(){
        var access = null;
        var access = checkUserAccess();

        if(access == "1"){
            //Navigate to Create User Account page
            //$('#response').html("Navigate to Create User Account page");
            window.location="createuseraccount.html";
        }else{
            $('#response').html("Access Denied!!!");
        }

    });

    $('#makeDeposit').click(function(){
        var access = null;
        access = checkUserAccess();

        if(access == "1" || access== "2"){
            //Navigate to Make Deposit Page
            $('#response').html("Navigate to Make Deposit Page");
        }else{
            $('#response').html("Access Denied!!!");
        }

    });

    $('#viewUser').click(function(){
        var access = null;
        access = checkUserAccess();

        if(access == "1" || access== "2" || access== "3"){
            //Navigate to View user info
            //$('#response').html("Navigate to View user info");
            window.location="userinformation.html";
        }else{
            $('#response').html("Access Denied!!!");
        }

    });

    $('#viewTrans').click(function(){
        var access = null;
        access = checkUserAccess();

        if(access == "1" || access== "2" || access== "3"){
            //Navigate to view transaction info
            $('#response').html("Navigate to view transaction info");
        }else{
            $('#response').html("Access Denied!!!");
        }

    });

});
