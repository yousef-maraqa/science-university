 
 
 $(function () {

  // import intlTelInput from 'intl-tel-input';

  // const input = document.querySelector("#PhoneNumber");
  // intlTelInput(input, {
  //   utilsScript: "utils.js"
  // });

// var PhoneNumber = document.querySelector("#PhoneNumber");
// window.intlTelInput(PhoneNumber, {
//   utilsScript: "../node_modules/intl-tel-input/build/js/utils.js"
// });
  // const Form = document.getElementById("Form");
  // const FullName = document.getElementById("FullName");
  // const Email = document.getElementById("Email");
  // const Textarea = document.getElementById("Textarea");
  // let flag =0;
  
  
  
  // function checkInputs() {
  //   const FullNameValue = FullName.value.trim();
  //   const PhoneNumberValue = PhoneNumber.value.trim();
  //   const EmailValue = Email.value.trim();
  //   const TextareaValue = Textarea.value.trim();
   
  //   if (FullNameValue === "") {
  //     setErrorFor(FullName, "username can not be blank");
  //     flag=1;
  //   } else {
  //     setSuccessFor(FullName);
  //     flag =0;
  //   }

  //   if (EmailValue === "") {
  //     setErrorFor(Email, "Email can not be blank");
  //     flag=1;
  //   } else if (!isEmail(EmailValue)) {
  //     setErrorFor(Email, "email is not valid");
  //     flag=1;
  //   } else {
  //     setSuccessFor(Email);
  //     flag=0;
  //   }

  //   if (PhoneNumberValue === "") {
  //     // console.log(PhoneNumber);
  //     // setErrorFor(PhoneNumber, "Phone number can not be blank");
  //   }
  //    else if (!isPhoneNum(PhoneNumberValue)) {
  //     setErrorFor(PhoneNumber, `phone number can not be blank`);
  //     flag=1;
      
  //   } else {
  //     setSuccessFor(PhoneNumber);
  //     flag=0;
  //   }

  //   if (TextareaValue === "") {
  //     setErrorFor(Textarea, "Text area can not be blank");
  //     flag=1;
  //   } else {
  //     setSuccessFor(Textarea);
  //     flag=0;
  //   }
  //   return flag
  // }
  // $( "#Form" ).submit(  function( event ) {
  //   // event.preventDefault();
  //   checkInputs();
  
  // });

  // function setErrorFor(input, message) {
  //   const groupControl = input.parentElement;
  //   const small = groupControl.querySelector("small");
  //   small.innerText = message;
  //   groupControl.classList.remove("success");
  //   groupControl.classList.add("error");
  // }

  // function setSuccessFor(input) {
  //   const groupControl = input.parentElement;
  //   groupControl.classList.remove("error");
  //   groupControl.classList.add("success");
  // }

  // function isEmail(Email) {
  //   const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  //   return re.test(Email);
  // }
  // function isPhoneNum(num) {
  //   const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  //   return re.test(num);
  // }
});

