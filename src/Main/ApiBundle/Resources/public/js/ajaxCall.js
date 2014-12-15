/**
 * Created by Lednicky on 14.12.2014.
 */

function ajaxCall(notificationId, response){

    $.ajax({
        url: ajaxLink,
        data: {
            notificationId: notificationId,
            response: response

        },
        dataType: 'json',

        success: function(response){

            if(response.code == 100){
                alert('1');

            }

        },
        beforeSend: function(){

        },
        complete: function(){
            $("")
        }

    });
}