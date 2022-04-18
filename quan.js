// Mấy cái này là function theo thứ tự của thầy nha
// Những gì tao làm nè :
// 1 : Check email in proper format
// 2 : Email case insensitive
// 3 : Password 
//     3.1 : Dài 8 - 20 kí tự 
//     3.2 : 1 chữ cái thường 
//     3.3 : 1 chữ hoa 
//     3.4 : 1 số 
// 4 : Retype Password giống với Password 
// 5 : Profile Picture chỉ nhận file (.jpg, .jpeg, .png, .gif)
// 6 : Tên dài từ 2 - 20 kí tự 
// 7 : Icon check đúng sai sẽ liên tục chạy khi user type vào 
// Note : Mấy cái document.querySelectorAll("p")[x] trong script này tương ứng với thứ tự của ELEMENT P bên html tương ứng
// Note : Cần sửa lại id cho đúng với file HTML
// Note : Hai function dưới cùng có công dụng 
// 1 : Check liên tục mỗi khi user input ( type vào ô )
// 2 : Khi user bấm Clear - Sẽ xóa cái icon bên phải ( nếu ko có function này thì nút Clear chỉ xóa bên trong ô INPUT thôi)
// Những thứ cần giữ ở file HTML tương ứng 
// 1 : 2 cái css
// 2 : Full Body

function validateEmail() {
    let email = document.querySelector("#email").value;
    const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const emailClasses = document.querySelectorAll("p")[0].classList;
    let emailValid = email.match(validRegex);
    if (emailValid) {
        emailClasses.remove("false");
        emailClasses.add("true");
        return emailValid;
    } else {
        emailClasses.remove("true");
        emailClasses.add("false");
        return emailValid;
    }
}

function validatePassword() {
    let pass = document.querySelector("#password").value;
    const passwordClasses = document.querySelectorAll("p")[1].classList;
    let final = false;
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
    // Check same passwords
    let samepass = false;
    let pass1 = document.querySelector('#password').value;
    let pass2 = document.querySelector('#retype_password').value;
    if (pass1 === pass2) {
        samepass = true;
    } else {
        samepass = false;
    }
    const passValidate = lengthCheck && foundLower && foundUpper && foundDigit;
    // Final check
    if  (passValidate){
        passwordClasses.remove("false");
        passwordClasses.add("true");
    } else {
        passwordClasses.remove("true");
        passwordClasses.add("false");
    }
    if (passValidate     && samepass) {
        final = true;
        passwordClasses.remove("false");
        passwordClasses.add("true");
        return final;
    } else {
        passwordClasses.remove("true");
        passwordClasses.add("false");
        return final;
    }
}

function validateName() {
    let fname = document.querySelector("#f_name").value;
    let lname = document.querySelector("#l_name").value;
    const firstNameClasses = document.querySelectorAll("p")[4].classList;
    const lastNameClasses = document.querySelectorAll("p")[5].classList;
    const nameValid = (fname.length > 2 && fname.length < 20) && (lname.length > 2 && lname.length < 20);
    if (nameValid) {
        firstNameClasses.remove("false");
        firstNameClasses.add("true");
        lastNameClasses.remove("false");
        lastNameClasses.add("true");
    } else {
        firstNameClasses.remove("true");
        firstNameClasses.add("false");
        lastNameClasses.remove("true");
        lastNameClasses.add("false");
    }
    return nameValid;
}

function continuousValidate() {
    validateEmail();
    validateName();
    validatePassword();
}

function resetValidate() {
    for (let i = 0; i < 6; i++) {
        document.querySelectorAll("p")[i].classList.remove("true");
        document.querySelectorAll("p")[i].classList.remove("false");
    }
}