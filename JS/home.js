
$(document).ready(
    
    function() {
        $.getScript("JS/speech_to_text.js", function() {});

        $(document).click(
            function() {
                
                var txt = "This is the homepage. Here you can join, view, or donate to different causes. Would you like to learn how to use this web application? Please answer, yes or no";
                
                text_to_speech(txt, process_fspeech);
                
                
                function process_fspeech() {
                    let home_grammar = "#JSGF V1.0; grammar options; public <option> = 'yes' | 'no';";
                    speech_to_text(home_grammar, function(event) {
                        if(event.results[0][0].transcript == "yes") {
                            let infosay = new SpeechSynthesisUtterance();
                            infosay.lang = "en";
                            infosay.text = `This is Omni. A web app designed to make it easier,safer, 
                            and more efficient to donate and volunteer to causes you love, as well as bringing everyone in the community together
                            to plan, talk, and organize around issues that are important to all. Instead of donating to a charity, you can donate to a "cause".
                            Think of a cause like a black, opaque box, where you can put money inside and it's distributed by the cause leaders. But you don't need to see that. 
                            We've abstracted it out for you. However, if you wish to view what goes on, you can join a cause. Joining a cause means you'll receive notifications for volunteering, you'll also be able to vote on cause issues, and you can even create branches.
                            What are branches, you ask? Branches are special parts of a cause where you need to organize around something really specific.
                            For example, if you wish to help homeless people around South Dublin, then you can create a branch where you and others interested can organize.
                            Likewise with causes, you can also join branches.  Now a brief tutorial on how to navigate the website. If you wish to view all causes available, please use the command "view all".
                            If you wish to view all of the causes you have already joined, use the command "view mine". If you wish to donate to a particular cause, use the command "donate" followed by the cause name.
                            Then you'll be prompted to specify the amount you wish to donate. If you wish to join a cause, simply use the command "join" followed by the cause name. 
                            If you wish to create a cause, use the command "create", after which you will be prompted further. 
                            If you wish to enter dashboard mode, which is where you can view details, notifications, and general information as well as communicate on the cause group-chat, then use the command "inspect", followed by the cause name. 

                            `;
                            window.speechSynthesis.speak(infosay);

                            
                        }

                        speech_to_text("", process_cmd);


                    });

                }

                function process_cmd(event) {
                    if(event.results[0][0].transcript == "view all") {
                        $.post(
                            "home.php",
                            {all: "all"},
                            function(response) {
                                text_to_speech(response, function(){console.log(response)});
                            }
                        );
                    }

                    else if(event.results[0][0].transcript == "view mine") {
                        $.post(
                            "home.php",
                            {mine: "mine"},
                            function(response) {
                                text_to_speech(response, function(){});

                            }
                        );
                    }

                    else if(event.results[0][0].transcript == "join") {
                        
                    }

                    else if(event.results[0][0].transcript == "create") {

                    }

                    else if(event.results[0][0].transcript == "donate") {
                        
                    }

                    else if(event.results[0][0].transcript == "inspect") {

                    }
                }

                
            }
        );
    }
);