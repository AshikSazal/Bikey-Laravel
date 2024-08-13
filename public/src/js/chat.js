$(document).ready(function(){
    // Load old chats
    function loadOldChats(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            url: "/load-chats",
            type: "POST",
            data: { sender_id: sender_id, receiver_id: receiver_id},
            success: function(res){
                const chats = res.data;console.log(chats);
                let html='';
                let top=0;
                for(let i=0;i<chats.length;i++){
                    let margin = '';
                    let svg='';
                    if(chats[i].sender_id == sender_id){
                        margin = 'right-0';
                        svg=`<svg height="20" width="20" class="text-orange_color -ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-id="${chats[i].id}">
                                <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                            </svg>`;
                    }else{
                        margin = 'left-0';
                    }
                    html += `
                        <div style="top: ${top}px;" class="flex absolute items-center ${margin}" id="${chats[i].id}-chat">
                            ${svg}
                            <span class="bg-sky_blue_color rounded-full px-2">${chats[i].message}</span>
                        </div>
                    `;
                    top+=30;
                }
                $("#show-message").append(html);
                // scrollChat();
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
    }

    // $("direct-message").click(function(){
        loadOldChats();
    // })

    // Message send
    $("#chat-form").submit(function(event){
        event.preventDefault();
        const message = $("#message-input").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            url: '/save-chat',
            type: 'POST',
            data: {
                sender_id: sender_id, 
                receiver_id: receiver_id, 
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

// send message to the user
Echo.private('broadcast-message')
.listen('MessageSentEvent',(data)=>{
    // console.log(data)
    // if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id){
        // const html = `
        //     <div class="distance-user-chat" id='`+data.chat.id+`-chat'>
        //         <h5><span>`+data.chat.message+`</span></h5>
        //     </div>
        // `;
        const html = `
                    <div class="flex items-center">
                        <span class="bg-sky_blue_color rounded-full p-2">${data.message.message}</span>
                        <svg height="25" width="25" class="text-orange_color -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
                            <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                        </svg>
                    </div>
                `;
        $("#show-message").append(html);
        // scrollChat();
    // }
});

// User online or offline checking
Echo.join("status-update")
.here((users)=>{
    console.log(users);
}).joining((user)=>{
    console.log(user);
}).leaving((user)=>{
    console.log(user);
}).listen('UserStatusEvent',(e)=>{
    console.log("Hello world"+e);
});