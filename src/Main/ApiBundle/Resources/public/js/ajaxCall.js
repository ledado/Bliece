/**
 * Created by Lednicky on 14.12.2014.
 */

function confirmNotification(notificationId, response){

    $.ajax({
        url: confirmNotificationLink,
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
function getAvailableUser(eventId){
    $.ajax({
        url: availableUserLink,
        data: {
            eventId: eventId
        },
        dataType: 'json',

        success: function(response){

            if(response.code == 100){
                userId = response.availableUsersId
                userName = response.availableUsersName

                len = userId.length;
                for (index = 0;  index < len; ++index) {

                    if(response.isInvite[index] == 1){
                        $(".participant-area").append('<div class="available-user">'+userName[index]+'<div class="invited" style="float:right"><b>Is invited</b></div></div>')
                    }else{
                        $(".participant-area").append('<div class="available-user">'+userName[index]+'<button class="invite u'+userId[index]+'" style="float:right" onclick="addParticipant('+userId[index]+', '+eventId+')">Invite</button></div>')
                    }
                }

            }

        },
        beforeSend: function(){
            $(".available-user").remove()

        },
        complete: function(){
            $("#shadow-box").css('display', 'block')
        }

    });
}
function addParticipant(participantId, eventId){
    $.ajax({
        url: addParticipantLink,
        data: {
            participantId: participantId,
            eventId: eventId
        },
        dataType: 'json',

        success: function(response){

            if(response.code == 100){


            }

        },
        beforeSend: function(){
           $(".u"+participantId).replaceWith('<div style="float:right"><b>Is invited</b></div>')

        },
        complete: function(){

        }

    });
}





function cloaseAlert(){
    $("#shadow-box").css('display', 'none')
}