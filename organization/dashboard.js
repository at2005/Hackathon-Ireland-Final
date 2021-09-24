$(document).ready(
    function() {

        $.getScript("../JS/speech_to_text.js", function(){});
        
        $(document).click(
            function() {
                let infostr2 = `You are now in dashboard mode. Use the command, "overview" to get an overview of your cause.
                If you wish to enter the chat, use the command, "chat". To see financial information, use the command, "finance". 
                If you want to see which events are coming up, use the, "events", command. And to view branch information, use the, "branches", command.`;
                text_to_speech(infostr2, function() {
                    speech_to_text("", function(event) {
                        if(event.results[0][0] == "overview") {
                            $.get(
                                "dashboard.php",
                                {speech : "overview"},
                                function(response) {
                                    text_to_speech(response.content, function(){});
                                }
                            );
                        }

                        else if(event.results[0][0] == "chat") {
                           location.href = "../msg.html";
                        }

                        else if(event.results[0][0] == "finance") {
                            $.get(
                                "dashboard.php",
                                {speech : "finance"},
                                function(response) {
                                    text_to_speech(response.content, function(){});


                                }
                            );
                        }

                        else if(event.results[0][0] == "events") {
                            $.get(
                                "dashboard.php",
                                {speech : "events"},
                                function(response) {
                                    text_to_speech(response.content, function(){});

                                }
                            );
                        }

                        else if(event.results[0][0] == "branches") {
                            $.get(
                                "dashboard.php",
                                {speech : "branches"},
                                function(response) {
                                    text_to_speech(response.content, function(){});

                                }
                            );
                        }

                    });
                });
            }
        );


        $("#hc").trigger("hover");

        $("#Chat").click(
           function() {
                window.location = "../msg.html";
            }
        );

        $("#Finances").hover(
            function() {
                $.get(
                    "dashboard.php",
                    {type: "finance"},
                    function(response) {
                        document.getElementById("hc").innerHTML = response.content;
                        

                    }

                );
            }
        );

        $("#Events").hover(
            function() {
                $.get(
                    "dashboard.php",
                    {type: "events"},
                    function(response) {
                        document.getElementById("hc").innerHTML = response.content;
                      

                    }
                );
            }
        );

        $("#Dashboard").hover(
            function() {
                $.get(
                    "dashboard.php",
                    {type: "dashboard"},
                    function(response) {
                        document.getElementById("hc").innerHTML = response.content;
                        


                    }
                );
            }
        );

        $("#Branches").hover(
            function() {
                $.get(
                    "dashboard.php",
                    {type: "branches"},

                    function(response) {
                    
                        document.getElementById("hc").innerHTML = response.content;
                        
                    }
                );
            }
        )

      
    }
);