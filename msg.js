$(document).ready(
    function() {
        var chatlog = document.getElementById("output");
        function loadChat() {
            $.get(
                "chat.php",
                {getfile: "chat"},
                function(response) {
                    chatlog.innerHTML = response.out;

                }

            )
        }

        setInterval(loadChat, 200);
        $(document).on("keypress", function(event) {
                if(event.which == 13) {
                        $("#chatsend").trigger("click");
                        document.getElementById("chattext").value = "";
                        event.preventDefault();
                }

        });


        $("#chatsend").click(
            function(event) {
                $.post(
                    "chat.php",
                    {chatmsg: $("#chattext").val()},
                    function(response) {
                        loadChat();
                        console.log(response.out);
                    }
                )
                event.preventDefault();
                chatlog.scrollTop = chatlog.scrollHeight;

            }
        );


        $("#clear").click(
            function(event) {
                $.get(
                    "chat.php",
                    {},
                    function(response) {
                        chatlog.innerHTML =  response.out;
                    }
                );
                event.preventDefault();
            }
        )

    }

);
