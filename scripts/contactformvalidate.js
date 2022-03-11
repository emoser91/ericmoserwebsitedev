// Contact Form Validation
//Note that this JS can not be used on the Quote page because it has more then one google reCAPTCHA

function validateEmail(email){
    var re = /\S+@\S+\.\S+/;
    //return true if valid email
    return re.test(email);
}

function validatePhoneNumber(phone){
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    //return true if valid phone
    return re.test(phone);
}

function isCyrillicAlphabet(input){
    //Range of Cyrillic alphabet (Russian)
    var re = /[\u0400-\u04FF]/;
    //return true if Cyrillic character detected
    return re.test(input);
}

function validateRecaptcha(recaptcha){
    if(recaptcha.length == 0){
        //reCaptcha not verified
        return false;
    }
    else{
        //reCaptch verified
        return true;
    }
}

function validate() {
    var name = document.getElementById("name").value;
    var subject = document.getElementById("subject").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    var text;

    if (name.length < 1 || isCyrillicAlphabet(name)) {
        document.getElementById('name').style.borderColor = "red";
        text = "Please Enter Valid Name";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('name').style.borderColor = "#e0e0e0";
    }

    if (subject.length < 1 || isCyrillicAlphabet(subject)) {
        document.getElementById('subject').style.borderColor = "red";
        text = "Please Enter Subject";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('subject').style.borderColor = "#e0e0e0";
    }

    if (validatePhoneNumber(phone) == false) {
        document.getElementById('phone').style.borderColor = "red";
        text = "Please Enter Valid Phone Number";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('phone').style.borderColor = "#e0e0e0";
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

    if (message.length <= 1 || isCyrillicAlphabet(message)) {
        document.getElementById('message').style.borderColor = "red";
        text = "Please Enter Message";
        error_message.innerHTML = text;
        return false;
    }
    else{
        document.getElementById('message').style.borderColor = "#e0e0e0";
    }

    if (validateRecaptcha(grecaptcha.getResponse()) == false){
        //g-recaptcha uses i-frame and we cant add styles for red
        text = "Please Verify you are Human";
        error_message.innerHTML = text;
        return false;
    }

    // alert("Form Submitted Successfully!");
    // Clear out error banner on success
    error_message.style.padding = "0px";
    error_message.innerHTML = null;

    return true;
}

