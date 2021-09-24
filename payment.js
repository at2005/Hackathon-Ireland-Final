const stripe = Stripe("pk_test_51IvoIoK5LGSIM6cwK34i3C9tPHyyCqNF2feev0HTf2EExouetnSQNbamAO2YCtFqrmOlg3QnWcgqKj5uCbaaoCRV00UMnsVwCb");

function return_server_response(response) {
    return response.json();
}

function direct_stripe(session) {
    //alert(session.val);
    return stripe.redirectToCheckout({sessionId : session.id});
}

function payment_err(result) {
    if(result.error) {
        alert("error");
    }
}

function on_lbutton_click() {
    var user_amount = document.getElementById("lodge_form");
    var form_data_obj = new FormData(user_amount);
    fetch("http://localhost/hackathon/payments.php", {method: "POST", body: form_data_obj}).then(return_server_response).then(direct_stripe);
}

var lodge_button = document.getElementById("lbutton");
lodge_button.addEventListener("click", on_lbutton_click);

