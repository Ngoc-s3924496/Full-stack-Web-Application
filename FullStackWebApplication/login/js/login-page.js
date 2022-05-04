function openRegister() {
    let card = document.getElementById("card");
    card.style.transform = "rotateY(-180deg)";
}

function openLogin() {
    let card = document.getElementById("card");
    card.style.transform = "rotateY(0deg)";
}

function validateEmail() {
    let email = document.querySelector("#email").value;
    const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const emailedit = document.querySelector("#email");


    let emailValid = email.match(validRegex);
    if (emailValid) {
        emailedit.style.border = "1.25px solid rgb(6, 255, 0)";
        return emailValid;
    } else {
        emailedit.style.border = "1.25px solid rgb(255, 23, 0)";
        return emailValid;
    }
}

function validatePassword() {
    let pass = document.querySelector("#password").value;
    let pass2 = document.querySelector('#retype_password').value;
    const passwordedit = document.querySelector("#password");
    const retype_passwordedit = document.querySelector("#retype_password");
    // Length check
    let lengthCheck = (pass.length >= 8 && pass.length <= 20);
    //lower case check
    let foundLower = false;
    let lowerStr = "abcdefghijklmnopqrstupwxyz";
    for (let i = 0; i < pass.length; i++) {
        let c = pass.charAt(i);
        if (lowerStr.includes(c)) {
            foundLower = true;
            break;
        } else {
            foundLower = false;
        }
    }
    // upper case check
    let foundUpper = false;
    let upperStr = "ABCDEFGHIJKLMNOPQRSTUPWXYZ";
    for (let j = 0; j < pass.length; j++) {
        let d = pass.charAt(j);
        if (upperStr.includes(d)) {
            foundUpper = true;
            break;
        } else {
            foundUpper = false;
        }
    }
    // number check
    let foundDigit = false;
    let digit = "0123456789";
    for (let k = 0; k < pass.length; k++) {
        let e = pass.charAt(k);
        if (digit.includes(e)) {
            foundDigit = true;
            break;
        } else {
            foundDigit = false;
        }
    }
    const passValidate = lengthCheck && foundLower && foundUpper && foundDigit;
    // Final check
    if (passValidate) {
        passwordedit.style.border = "1.25px solid rgb(6, 255, 0)";
    } else {
        passwordedit.style.border = "1.25px solid rgb(255, 23, 0)";
    }
    if (pass2 == pass) {
        retype_passwordedit.style.border = "1.25px solid rgb(6, 255, 0)";
    } else {
        retype_passwordedit.style.border = "1.25px solid rgb(255, 23, 0)";
    }
}

function validateFirstName() {
    let fname = document.querySelector("#f_name").value;
    const firstNameedit = document.querySelector("#f_name");
    const firstnameValid = (fname.length > 2 && fname.length < 20);
    if (firstnameValid) {
        firstNameedit.style.border = "1.25px solid rgb(6, 255, 0)";

    } else {
        firstNameedit.style.border = "1.25px solid rgb(255, 23, 0)";
    }
}

function validateLastName() {
    let lname = document.querySelector("#l_name").value;
    const lastNameedit = document.querySelector("#l_name");
    const lastnameValid = (lname.length > 2 && lname.length < 20);
    if (lastnameValid) {
        lastNameedit.style.border = "1.25px solid rgb(6, 255, 0)";
    } else {
        lastNameedit.style.border = "1.25px solid rgb(255, 23, 0)";
    }
}

function continuousValidateEmail() {
    validateEmail();
}

function continuousValidatePassword() {
    validatePassword();
}

function continuousValidateFirstName() {
    validateFirstName();
}

function continuousValidateLastName() {
    validateLastName();
}

function resetValidate() {
    document.getElementById("email").removeAttribute("style");
    document.getElementById("password").removeAttribute("style");
    document.getElementById("retype_password").removeAttribute("style");
    document.getElementById("f_name").removeAttribute("style");
    document.getElementById("l_name").removeAttribute("style");
}
