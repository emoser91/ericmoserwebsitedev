// Upload Form Validation
//Note that this JS can not be used on the Quote page because it has more then one google reCAPTCHA

//I TRIED TO GET THIS WORKING BUT IT DID NOT WANT TO WORK. DROPZONE MIGHT BE GETTING IN THE WAY
// THIS FILE IS NOT ON THE LIVE WEBSITE

function validateEmail(email){
    var re = /\S+@\S+\.\S+/;
    //return true if valid email
    return re.test(email);
}

function isCyrillicAlphabet(input){
    //Range of Cyrillic alphabet (Russian)
    var re = /[\u0400-\u04FF]/;
    //return true if Cyrillic character detected
    return re.test(input);
}

function validateuploadform() {
    var name = document.getElementById("fullname").value;
    var company = document.getElementById("company").value;
    var email = document.getElementById("emailaddr").value;
    var salesman = document.getElementById("salesman").value;
    var message = document.getElementById("messageinfo").value;
    var error_message = document.getElementById("upload_error_message");

    error_message.style.padding = "10px";

    var text;

    if (name.length < 1 || isCyrillicAlphabet(name)) {
        document.getElementById('fullname').style.borderColor = "red";
        text = "Please Enter Valid Name";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('fullname').style.borderColor = "#e0e0e0";
    }

    if (company.length < 1 || isCyrillicAlphabet(company)) {
        document.getElementById('company').style.borderColor = "red";
        text = "Please Enter Company";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('company').style.borderColor = "#e0e0e0";
    }

    if(validateEmail(email) == false || isCyrillicAlphabet(email)){
        document.getElementById('email').style.borderColor = "red";
        text = "Please Enter Valid Email";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('email').style.borderColor = "#e0e0e0";
    }

    if (salesman.length <= 1 || isCyrillicAlphabet(salesman)) {
        document.getElementById('salesman').style.borderColor = "red";
        text = "Please Enter Salesman";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('salesman').style.borderColor = "#e0e0e0";
    }

    if (message.length <= 1 || isCyrillicAlphabet(message)) {
        document.getElementById('messageinfo').style.borderColor = "red";
        text = "Please Enter Message";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('messageinfo').style.borderColor = "#e0e0e0";
    }

    // alert("Form Submitted Successfully!");
    // Clear out error banner on success
    error_message.style.padding = "0px";
    error_message.innerHTML = null;

    return true;
}

