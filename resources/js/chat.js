$(document).ready(function(){

    // Message send
    $("#message-send-form").submit(function(event){
        event.preventDefault();
        const message = $("#message-input").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            url: '/save-message',
            type: 'POST',
            data: {
                sender_id: sender_id, 
                receiver_id: 1, 
                message: message
            },
            success: function(res){
                const chat = res.chat;
                const html = `
                    <div class="flex items-center">
                        <span class="bg-sky_blue_color rounded-full p-2">${chat.message}</span>
                        <svg height="25" width="25" class="text-orange_color -ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
                            <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                        </svg>
                    </div>
                `;
                $("#show-message").append(html);
            },
            error: function(xhr, status, error){
                const showError = document.getElementById('open-pop-up');
                
                showError.style.display = "flex";
                showError.classList.add("z-20","bg-black", "bg-opacity-80");
                document.body.style.overflow = 'hidden';
                $('#show-error-message').text(xhr.responseJSON.error);
                $("#show-error-message").show();
            }
        });
    });
});

// // send message to the user
Echo.private('broadcast-message')
.listen('MessageSentEvent',(data)=>{
    console.log(data)
    // if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id){
        // const html = `
        //     <div class="distance-user-chat" id='`+data.chat.id+`-chat'>
        //         <h5><span>`+data.chat.message+`</span></h5>
        //     </div>
        // `;
        // const html = `
        //             <div class="flex items-center">
        //                 <span class="bg-sky_blue_color rounded-full p-2">${data.chat.message}</span>
        //                 <svg height="25" width="25" class="text-orange_color -ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
        //                     <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
        //                 </svg>
        //             </div>
        //         `;
        // $("#show-message").append(html);
        // scrollChat();
    // }
});