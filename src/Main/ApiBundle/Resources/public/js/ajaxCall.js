/**
 * Created by Lednicky on 14.12.2014.
 */

function confirmNotification(notificationId, response){

    $.ajax({
        url: ajaxLink,
        data: {
            notificationId: notificationId,
            response: response

        },
        dataType: 'json',

        success: function(response){

            if(response.code == 100){


            }

        },
        beforeSend: function(){
            $("#notification"+notificationId).remove();
        },
        complete: function(){

        }

    });
}
function sendConnectRequest(userId){
    $.ajax({
        url: connectLink,
        data: {
            toUserId: userId
        },
        dataType: 'json',

        success: function(response){

            if(response.code == 100){


            }

        },
        beforeSend: function(){
            $(".sendConnect").remove()
            $("#connect-loader").css('display','block')

        },
        complete: function(){
            $("#connect-loader").remove()
            $(".connect-box").append('<b>Request has been send</b>')
        }

    });
}