function text_to_speech(text, nextf) {
    var speech = new SpeechSynthesisUtterance();
    speech.lang = "en";
    speech.text = text;
    speech.onend = nextf;
    window.speechSynthesis.speak(speech);
}

function speech_to_text(grammar, resf) {
    var recognize = new webkitSpeechRecognition();
    if(grammar != "") {
        var glist = new webkitSpeechGrammarList();
        glist.addFromString(grammar,1);
    }

    

    recognize.lang = "en";
    recognize.onresult = resf;
    recognize.start();

}