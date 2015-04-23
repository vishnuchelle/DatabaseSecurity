/**
 * Created by Vishnu Chelle on 4/23/2015.
 */

$(document).ready(function(){

    $('#showBtn').click(function(){

        //AJAX CALl
        $.ajax({
            type: "GET",
            url: "viewCustomerInfo.php",
            data: "userName=" + $('#userName').val(),
            success: function(resp){

                //$('#response').html(response)

                obj = JSON.parse(resp);

                //var keys = ["CustomerID", "FirstName", "LastName", "MiddleName", "Address", "PhoneNumber", "BranchCode", "Zip", "State", "City"];

                var divHtml = '';

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Customer ID" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.CustomerID + "</span>";
                divHtml += "</div></div>";

                divHtml += "</div></div>";
                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Branch Code" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.BranchCode + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "First Name" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.FirstName + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Middle Name" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.MiddleName + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Last Name" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.LastName + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Phone Number" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.PhoneNumber + "</span>";
                divHtml += "</div></div>";


                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Address" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.Address + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "City" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.City + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "State" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.State + "</span>";
                divHtml += "</div></div>";

                divHtml += "<div class='row'><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-warning'>" + "Zip" + "</span>";
                divHtml += "</div><div class='col-xs-4 col-xs-push-2'>";
                divHtml += "<span class='text-info'>" + obj.Zip + "</span>";
                divHtml += "</div></div>";

                //divHtml += "<p>" + resp + ""  +"</p>";

                $("#infoContainer").append(divHtml);

            }
        });





    });

});

