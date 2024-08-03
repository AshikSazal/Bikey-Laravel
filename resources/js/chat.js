$(document).ready(function(){

    // Message send
    $("#message-send-form").submit(function(event){
        event.preventDefault();
        const message = $("#message-input").val();
        $.ajax({
            url: '/save-message',
            type: 'POST',
        })
    })
})


// send message to the user
Echo.private('broadcast-message')
.listen('MessageSentEvent',(data)=>{
    if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id){
        let html = `
            <div class="distance-user-chat" id='`+data.chat.id+`-chat'>
                <h5><span>`+data.chat.message+`</span></h5>
            </div>
        `;
        $("#show-message").append(html);
        // scrollChat();
    }
});