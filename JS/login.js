$(document).ready(
    function() {
        // upon clicking the page
        $(document).click(
            function() {
                // create a speech synthesis object
                var speech = new SpeechSynthesisUtterance();
                // set language
                speech.lang = "en";
                // set speech text
                speech.text = "This is the login page. Please enter or say your email";
                
                // when this speech ends we wish to redirect control
                speech.onend = ask_email;
                // start speech synthesis

                window.speechSynthesis.speak(speech);


                function ask_email() {
                    // set grammar
                    var grammar = ["#JSGF V1.0; grammar options; public <option> = 'sign up' | 'login';"];
                    // create speech recognition object
                    var recognize = new webkitSpeechRecognition();
                    // we wish to keep recording unless prompted otherwise
                    recognize.continuous = true;
                    // set language
                    recognize.lang = "en";
                    // create grammar list object
                    var glist = new webkitSpeechGrammarList();
                    // set grammar list to grammar which we defined
                    glist.addFromString(grammar,1);
                    // upon receiving the result
                    
                    recognize.onresult =
                        function(event) {
                            document.getElementById("mail").value = event[0][0].transcript;
                    }
                    
                    
                    recognize.onend = function() {
                        speech.text = "Enter or say your password please: ";
                        
                    }
    
                    recognize.start();

                }

            }
        );
    }
);