// Quote Form Validation
// There are two different locations that show error messages based on which part of the from an error occurs. 
// The page will center on the error messages

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

function centerOnErrorMessage(){
    document.getElementById("quote_error_message").scrollIntoView({
        block: 'center',
      });

    document.getElementById("quote_error_message2").style.padding = "0px";
    document.getElementById("quote_error_message2").innerHTML = null;
}

function centerOnErrorMessage2(){
    document.getElementById("quote_error_message2").scrollIntoView({
        block: 'center',
      });

    document.getElementById("quote_error_message").style.padding = "0px";
    document.getElementById("quote_error_message").innerHTML = null;
}

function validatequoteform() {
    var name = document.getElementById("fullname").value;
    var company = document.getElementById("company").value;
    var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zipcode = document.getElementById("zipcode").value;
    var phone = document.getElementById("phonenumber").value;
    var email = document.getElementById("emailaddr").value;

    var subject = document.getElementById("subjectjob").value;
    var quantity = document.getElementById("quantity").value;
    var numberofpages = document.getElementById("numberofpages").value;
    var finishedsize = document.getElementById("finishedsize").value;
    var stock = document.getElementById("stock").value;
    var ink = document.getElementById("ink").value;
    var sides = document.getElementById("sides").value;
    var artwork = document.getElementById("artwork").value;
    var duedate = document.getElementById("duedate").value;
    var messageinfo = document.getElementById("messageinfo").value;

    var error_message = document.getElementById("quote_error_message");
    var error_message2 = document.getElementById("quote_error_message2");
    error_message.style.padding = "10px";
    error_message2.style.padding = "10px";

    var text;

    if (name.length < 1 || isCyrillicAlphabet(name)) {
        document.getElementById('fullname').style.borderColor = "red";
        text = "Please Enter Valid Name";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('fullname').style.borderColor = "#e0e0e0";
    }

    if (company.length < 1 || isCyrillicAlphabet(company)) {
        document.getElementById('company').style.borderColor = "red";
        text = "Please Enter Valid Company";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('company').style.borderColor = "#e0e0e0";
    }

    if (address.length < 1 || isCyrillicAlphabet(address)) {
        document.getElementById('address').style.borderColor = "red";
        text = "Please Enter Valid Address";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('address').style.borderColor = "#e0e0e0";
    }

    if (city.length < 1 || isCyrillicAlphabet(city)) {
        document.getElementById('city').style.borderColor = "red";
        text = "Please Enter Valid City";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('city').style.borderColor = "#e0e0e0";
    }

    if (state.length < 1 || isCyrillicAlphabet(state)) {
        document.getElementById('state').style.borderColor = "red";
        text = "Please Enter Valid State";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('state').style.borderColor = "#e0e0e0";
    }

    if (zipcode.length < 1 || isCyrillicAlphabet(zipcode)) {
        document.getElementById('zipcode').style.borderColor = "red";
        text = "Please Enter Valid Zipcode";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('zipcode').style.borderColor = "#e0e0e0";
    }

    if (validatePhoneNumber(phone) == false) {
        document.getElementById('phonenumber').style.borderColor = "red";
        text = "Please Enter Valid Phone Number";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('phonenumber').style.borderColor = "#e0e0e0";
    }

    if(validateEmail(email) == false || isCyrillicAlphabet(email)){
        document.getElementById('emailaddr').style.borderColor = "red";
        text = "Please Enter Valid Email";
        error_message.innerHTML = text;
        centerOnErrorMessage();
        return false;
    }
    else{
        document.getElementById('emailaddr').style.borderColor = "#e0e0e0";
    }

    //Second Half of the Quote Form
    if (subject.length < 1 || isCyrillicAlphabet(subject)) {
        document.getElementById('subjectjob').style.borderColor = "red";
        text = "Please Enter Job Description";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('subjectjob').style.borderColor = "#e0e0e0";
    }

    if (quantity.length < 1 || isCyrillicAlphabet(subject)) {
        document.getElementById('quantity').style.borderColor = "red";
        text = "Please Enter Quantity";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('quantity').style.borderColor = "#e0e0e0";
    }

    if (numberofpages.length < 1 || isCyrillicAlphabet(numberofpages)) {
        document.getElementById('numberofpages').style.borderColor = "red";
        text = "Please Enter Number of Pages";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('numberofpages').style.borderColor = "#e0e0e0";
    }

    if (finishedsize.length < 1 || isCyrillicAlphabet(finishedsize)) {
        document.getElementById('finishedsize').style.borderColor = "red";
        text = "Please Enter Finished Size";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('finishedsize').style.borderColor = "#e0e0e0";
    }

    if (stock.length < 1 || isCyrillicAlphabet(stock)) {
        document.getElementById('stock').style.borderColor = "red";
        text = "Please Enter Stock";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('stock').style.borderColor = "#e0e0e0";
    }

    if (ink.length < 1 || isCyrillicAlphabet(ink)) {
        document.getElementById('ink').style.borderColor = "red";
        text = "Please Enter Ink";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('ink').style.borderColor = "#e0e0e0";
    }

    if (sides.length < 1 || isCyrillicAlphabet(sides)) {
        document.getElementById('sides').style.borderColor = "red";
        text = "Please Enter Sides";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('sides').style.borderColor = "#e0e0e0";
    }

    if (artwork.length < 1 || isCyrillicAlphabet(artwork)) {
        document.getElementById('artwork').style.borderColor = "red";
        text = "Please Enter Artwork";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('artwork').style.borderColor = "#e0e0e0";
    }

    if (duedate.length < 1 || isCyrillicAlphabet(duedate)) {
        document.getElementById('duedate').style.borderColor = "red";
        text = "Please Enter Due Date";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('duedate').style.borderColor = "#e0e0e0";
    }

    if (messageinfo.length <= 1 || isCyrillicAlphabet(messageinfo)) {
        document.getElementById('messageinfo').style.borderColor = "red";
        text = "Please Enter Message";
        error_message2.innerHTML = text;
        centerOnErrorMessage2();
        return false;
    }
    else{
        document.getElementById('messageinfo').style.borderColor = "#e0e0e0";
    }

    // alert("Form Submitted Successfully!");
    // Clear out error banner on success
    error_message.style.padding = "0px";
    error_message.innerHTML = null;

    error_message2.style.padding = "0px";
    error_message2.innerHTML = null;

    return true;
}

