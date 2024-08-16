// scroll div to the bottom
function scrollChat(){
    $("#show-message").parent().animate({
        scrollTop: $("#show-message").parent().offset().top + $("#show-message").parent()[0].scrollHeight
    },0);
}

// Show the menu
function showMenu(){
    $(".show-modify-icon").on('click', function(event) {
        event.stopPropagation(); // Prevent the click event from bubbling up to the document
        const chatId = $(this).data('id');
        const currentMenu = $(`.chat-modify-menu[data-id="${chatId}"]`);

        // Hide all menus except the one associated with the clicked icon
        $('.chat-modify-menu').not(currentMenu).addClass('hidden');

        // Toggle visibility of the current menu
        currentMenu.toggleClass('hidden');
    });
}

// Hide the menu when clicking outside of it
function hideMenu(){
    $(document).on('click', function(event) {
        var $target = $(event.target);

        // Check if the click is inside a chatbox or its menu
        if (!$target.closest('.chat-modify-menu').length) {
            $('.chat-modify-menu').addClass('hidden');
        }
    });
}

// Show modification icon
function showModification(){
    $(".show-modify").hover(
        function() {
            $(this).find('.show-modify-icon').removeClass("hidden").addClass("block");
        },
        function() {
            $(this).find('.show-modify-icon').removeClass("block").addClass("hidden");
        }
    );
    showMenu();
    hideMenu();
}

function convertToTextare(){
    $('#message-input').hide();
    $('#message-input-textarea').show();
    $('#message-input-textarea').focus();
}

function convertToInput(){
    $('#message-input-textarea').hide();
    $('#message-input').show();
    $('#message-input').focus();
}

$(document).ready(function(){

    // Get the clicked menu information
    $(document).on('click',".chat-modify-menu",function(){
        const chatId = $(this).attr('data-id');
        const message = $(this).attr('data-message');
        $("#live-chat-id").val(chatId);
        $('#message-input').val(message);
        $('#message-input-textarea').val(message);
        if($('#message-input').get(0).clientWidth < $('#message-input').get(0).scrollWidth){
            convertToTextare();
        }else{
            convertToInput();
        }
        $('#message-send-icon').removeClass('text-red-400').addClass('text-orange_color');
        $('#message-send-btn').prop('disabled', false);
        $('.chat-modify-menu').addClass('hidden');
    });

    // Load old chats
    function loadOldChats(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
            url: "/load-chats",
            type: "POST",
            data: { sender_id: sender_id, receiver_id: receiver_id},
            success: function(res){
                const chats = res.data;
                let html='';
                for(let i=0;i<chats.length;i++){
                    let svg = '', textColor = 'text-black', background="#e5e7eb", justify='', margin="margin-right: 20px;";
                    if(chats[i].sender_id == sender_id){
                        background = '#1ca3e4';
                        textColor = 'text-white';
                        justify = 'justify-end';
                        margin="margin-left: 20px;"
                        svg=`<svg height="20" width="20" class="text-sky_blue_color -ml-2 cursor-pointer hidden show-modify-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-id="${chats[i].id}">
                                <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                            </svg>`;
                    }
                    html += `
                        <div style="${margin}" class="flex items-center ${justify} show-modify mb-2" id="${chats[i].id}-chat">
                            ${svg}
                            <span style="background: ${background}; max-width:90%;" class="${textColor} text-justify rounded-md px-3 py-2 live">${chats[i].message}</span>
                            <div class="chat-modify-menu absolute right-0 mt-2 w-32 bg-white border border-gray-300 rounded-lg shadow-lg hidden" data-id="${chats[i].id}" data-message="${chats[i].message}">
                                <ul class="list-none p-2">
                                    <li class="cursor-pointer hover:text-sky_blue_color hover:underline">
                                        <button class="block px-4 py-2 text-gray-700">EDIT</button>
                                    </li>
                                    <li><hr></li>
                                    <li class="cursor-pointer hover:text-sky_blue_color hover:underline">
                                        <button class="block px-4 py-2 text-gray-700">DELETE</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `;
                }
                $("#show-message").append(html);
                scrollChat();
                showModification();
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
                $("#message-input").val("");
                const chat = res.chat;
                const html = `
                    <div style="margin-left: 20px;" class="flex items-center justify-end show-modify mb-2" id="${chat.id}-chat">
                        <svg height="20" width="20" class="text-sky_blue_color -ml-2 cursor-pointer show-modify-icon hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-id="26">
                            <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"></path>
                        </svg>
                        <span style="background: #e5e7eb; max-width:90%;" class="text-white text-justify rounded-md px-3 py-2">${chat.message}</span>
                        <div class="chat-modify-menu absolute right-0 mt-2 w-32 bg-white border border-gray-300 rounded-lg shadow-lg hidden" data-id="${chat.id}" data-message="${chat.message}">
                            <ul class="list-none p-2">
                                <li class="cursor-pointer hover:text-sky_blue_color hover:underline">
                                    <button class="block px-4 py-2 text-gray-700 ">EDIT</button>
                                </li>
                                <li><hr></li>
                                <li class="cursor-pointer hover:text-sky_blue_color hover:underline">
                                    <button class="block px-4 py-2 text-gray-700">DELETE</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                `;
                $("#show-message").append(html);
                scrollChat();
                showModification();
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
    if(sender_id == data.message.receiver_id && receiver_id == data.message.sender_id){
        const html = `
            <div style="margin-right: 20px;" class="flex items-center"  id="${data.message.id}-chat">
                <span style="background: #e5e7eb;" class="text-black text-justify rounded-md px-3 py-2">${data.message.message}</span>
            </div>
        `;
        $("#show-message").append(html);
        scrollChat();
        // showModification();
    }
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