/**
 * Created by Vishnu Chelle on 3/20/2015.
 */

$(document).ready(function(){

   $('#regBtn').click(function(){

       //FIXME add validations for the input variables.

       var hashPassword = CryptoJS.SHA512($('#password').val());
       var hashTPass = CryptoJS.SHA512($('#transPassword').val());

       var userObject= new Object();
       userObject.firstName = $('#fName').val();
       userObject.middleName = $('#mName').val();
       userObject.lastName = $('#lName').val();
       userObject.userName = $('#userName').val();
       userObject.password = hashPassword+"";
       userObject.transPassword = hashTPass+"";
       userObject.address1 = $('#address1').val();
       userObject.address2 = $('#address2').val();
       userObject.city = $('#city').val();
       userObject.zip = $('#zip').val();
       userObject.state = $('#state').val();
       userObject.email = $('#email').val();
       userObject.phoneNumber = $('#phoneNumber').val();
       userObject.branchCode = $("#branchCode option:selected").val();

       //Convert JSON to string
       var userRecord = JSON.stringify(userObject);


       // Ajax Call
       $.ajax({
           type: "GET",
           url: "registerUser.php",
           data: "user=" + userRecord+"",
           success: function(resp){
               //var obj = JSON.stringify(resp);
               //var obj = jQuery.parseJSON(resp);
               //$('#respReg').html(obj.userName);
               if ($.trim(resp) == "true"){
                   window.location="login.html";
               }else{
                   $('#respReg').html(resp);
               }
           }
       });

   });
});
