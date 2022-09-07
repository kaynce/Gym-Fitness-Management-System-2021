
  // When the user starts to type something inside the password field
 // myInput.onkeyup = function() {
  $(document).ready(function(){
      check();
  })

  var check = function(){
  // Validate lowercase letters
  var myInput = document.getElementById("signup_password");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.style.color = 'green';
  } else {
    letter.style.color = 'red';
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.style.color = 'green';
  } else {
    capital.style.color = 'red';
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.style.color = 'green';
  } else {
    number.style.color = 'red';
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.style.color = 'green';
  } else {
    length.style.color = 'red';
  }

}

//Confirm Password
// When the user starts to type something inside the password field
// myInput.onkeyup = function() {
  $(document).ready(function(){
      check2();
  })

  var check2 = function(){
  // Validate lowercase letters
  var myInput = document.getElementById("signup_cpassword");
  var letter = document.getElementById("letter2");
  var capital = document.getElementById("capital2");
  var number = document.getElementById("number2");
  var length = document.getElementById("length2");


  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.style.color = 'green';
  } else {
    letter.style.color = 'red';
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.style.color = 'green';
  } else {
    capital.style.color = 'red';
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.style.color = 'green';
  } else {
    number.style.color = 'red';
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.style.color = 'green';
  } else {
    length.style.color = 'red';
  }

}

