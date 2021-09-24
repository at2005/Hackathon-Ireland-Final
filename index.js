
function changelang(lang) {
    let header1 = document.getElementById("header1");
    let header2 = document.getElementById("h_higher");
    let subtext = document.getElementById("subtext");
    let signup = document.getElementById("signup");
    let login = document.getElementById("only");

    if(lang == "French") {
    header1.innerHTML = "La révolution";
    header2.innerHTML = "à portée de main";
    subtext.innerHTML = "Toutes vos ONG dans un hub intégré";
    signup.innerHTML = "Rejoindre";
    login.innerHTML = "Connexion";
    login.style.fontSize = "18px";
    
    signup.style.fontSize = "18px";

    }


    
    else if(lang == "Dutch") {
       header1.innerHTML = "Revolutie";
        header2.innerHTML = "binnen handbereik";
        subtext.innerHTML = "Al uw NGO's in één geïntegreerde hub";
        signup.innerHTML = "Meedoen";
        login.innerHTML = "Inloggen";
    }
     

}


$(document).ready(
    function() {
        // when page clicked on
        $(document).click(
            function() {
                // create speech synthesis object
                var speech = new SpeechSynthesisUtterance();
                // set language
                speech.lang = "en";
                // set text to say
                speech.text = "This site is an integrated hub for NGOs. You can donate to or join causes. Would you like to sign up or log in?";
                // when speech ends we wish to recognize user input speech
                speech.onend = function() {
                    // set grammar to either sign up or login
                    var grammar = ["#JSGF V1.0; grammar options; public <option> = 'sign up' | 'login';"];
                    // create speech recognition object
                    var recognize = new webkitSpeechRecognition();
                    // we wish to keep recording
                    recognize.continuous = true;
                    // set language
                    recognize.lang = "en";
                    // set grammar list object
                    var glist = new webkitSpeechGrammarList();
                    // set grammar
                    glist.addFromString(grammar,1);
                    // upon receiving user input
                    recognize.onresult =
                        function(event) {
                            // check if user input is login and redirect to login page
                            for(let i = 0; i < event.results.length; i++) {
                                if(event.results[i][0].transcript == "login") {
                                    window.location = "login.php";
                                } 
                                
                                // or check if user input is signup and redirect to signup page
                                else if(event.results[i][0].transcript == "sign up") {
                                    window.location = "signup.php";
                                }
                            }
                    }
                    
                    // start recognition
                    recognize.start();

                }

                // start speech
                window.speechSynthesis.speak(speech);

                

            
            
            }

        ); 
        
        
    }

);

