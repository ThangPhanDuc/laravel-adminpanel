<section class="gradient-custom">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-17 col-xl-12">

                <ul class="list-unstyled clearfix" id="ticketChatsList">
                    <!-- List of chat messages goes here -->
                </ul>

                <div class="mb-3">
                    <div class="form-outline form-white">
                        <textarea class="form-control" id="textAreaExample3" rows="4"></textarea>
                        <label class="form-label" for="textAreaExample3">Message</label>
                    </div>
                </div>

                <button type="button" class="btn btn-light btn-lg btn-rounded float-end" id="sendButton">Send</button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ticketId = {{ $id }};

        // Load initial ticket chats
        $.ajax({
            url: '/admin/tickets/' + ticketId + '/chats',
            type: 'GET',
            success: function(response) {
                displayTicketChats(response);
            },
            error: function(error) {
                console.error('Error fetching ticket chats:', error);
            }
        });

        // Display ticket chats
        function displayTicketChats(chats) {
            var list = document.getElementById('ticketChatsList');

            // Clear existing chat messages
            while (list.firstChild) {
                list.removeChild(list.firstChild);
            }

            chats.forEach(function(chat) {
                var listItem = document.createElement('li');
                listItem.classList.add('d-flex', 'mb-4');

                var isCurrentUser = chat.user.id === 1; // Replace with the actual user ID

                var contentHtml = '';

                if (isCurrentUser) {
                    contentHtml = `
                <div class="card mask-custom w-100">
                    <div class="card-header d-flex justify-content-between p-3" style="border-bottom: 1px solid rgba(255,255,255,.3);">
                        <p class="fw-bold mb-0">${chat.user.first_name}</p>
                        <p class="text-light small mb-0"><i class="far fa-clock"></i> ${chat.created_at}</p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">${chat.content}</p>
                    </div>
                </div>
                <img src="https://www.gravatar.com/avatar/7fbaf4fe3778cc913f8bfd8deb7578f4.jpg?s=80&d=mm&r=g" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                      `;
                } else {
                    contentHtml = `
                <img src="https://www.gravatar.com/avatar/7fbaf4fe3778cc913f8bfd8deb7578f4.jpg?s=80&d=mm&r=g}" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                <div class="card mask-custom">
                    <div class="card-header d-flex justify-content-between p-3" style="border-bottom: 1px solid rgba(255,255,255,.3);">
                        <p class="fw-bold mb-0">${chat.user.first_name}</p>
                        <p class="text-light small mb-0"><i class="far fa-clock"></i> ${chat.created_at}</p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">${chat.content}</p>
                    </div>
                </div>
                    `;
                }

                // Thêm class "float-end" nếu là user hiện tại
                if (isCurrentUser) {
                    listItem.classList.add(
                        // 'float-right'
                    );
                }

                listItem.innerHTML = contentHtml;
                list.appendChild(listItem);
            });
        }


        // Send new message
        document.getElementById('sendButton').addEventListener('click', function() {
            var messageContent = document.getElementById('textAreaExample3').value;
            sendNewMessage(messageContent);
        });

        // Handle sending new message
        function sendNewMessage(content) {
            if (content.trim() === '') {
                alert('Please enter a message.');
                return;
            }

            $.ajax({
                url: '/admin/tickets/' + ticketId + '/chats',
                type: 'POST',
                data: {
                    content: content
                },
                success: function(response) {
                    displayNewMessage(response.chat);
                    document.getElementById('textAreaExample3').value = '';
                },
                error: function(error) {
                    console.error('Error sending message:', error);
                }
            });
        }

        // Display new message
        function displayNewMessage(chat) {
            var list = document.getElementById('ticketChatsList');

            var listItem = document.createElement('li');
            listItem.classList.add('d-flex', 'mb-4');

            listItem.innerHTML = `
                <div class="card mask-custom w-100">
                    <div class="card-header d-flex justify-content-between p-3" style="border-bottom: 1px solid rgba(255,255,255,.3);">
                        <p class="fw-bold mb-0">${chat.user.first_name}</p>
                        <p class="text-light small mb-0"><i class="far fa-clock"></i> ${chat.created_at}</p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">${chat.content}</p>
                    </div>
                </div>
                <img src="https://www.gravatar.com/avatar/7fbaf4fe3778cc913f8bfd8deb7578f4.jpg?s=80&d=mm&r=g" alt="avatar" class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
            `;

            list.appendChild(listItem);
            list.scrollTop = list.scrollHeight;
        }

        Echo.channel('ticket-chat.' + 1)
            .listen('TicketChatCreated', (event) => {
                // Xử lý sự kiện khi có tin nhắn mới được tạo
                console.log(event.chat);
                // displayNewMessage(event.chat);
            });
    });
</script>
