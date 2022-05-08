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
  const emailClasses = document.querySelectorAll("p")[0];
  let emailValid = email.match(validRegex);
  if (emailValid) {
    emailClasses.className = "true";
    return emailValid;
  } else {
    emailClasses.className = "false";
    return emailValid;
  }
}

function validatePassword() {
    var password = document.querySelector("#password").value;
    var repassword = document.querySelector("#retype_password").value;
    const passwordClasses = document.querySelectorAll("p")[1];
    var pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])(.{8,20})$/;
    if (pattern.test(password) === true && password == repassword) {
        passwordClasses.className = "true";
        return true;
    } else {
        passwordClasses.className = "false";
        return false;
    }
}

function validateFname() {
  let fname = document.querySelector("#f_name").value;
  const firstNameClasses = document.querySelectorAll("p")[4];
  const nameValid = (fname.length >= 2 && fname.length <= 20);
  if (nameValid) {
    firstNameClasses.className = "true";
  } else {
    firstNameClasses.className = "false";
  }
  return nameValid;
}

function validateLname() {
  let lname = document.querySelector("#l_name").value;
  const lastNameClasses = document.querySelectorAll("p")[5];
  const nameValid = lname.length >= 2 && lname.length <= 20;
  if (nameValid) {
    lastNameClasses.className = "true";
  } else {
    lastNameClasses.className = "false";
  }
    return nameValid;
}
function continuousValidate() {
  validateEmail();
  validatePassword();
  validateFname();
  validateLname();
}

function resetValidate() {
  for (let i = 0; i < 6; i++) {
    document.querySelectorAll("p")[i].className = "";
  }
}
