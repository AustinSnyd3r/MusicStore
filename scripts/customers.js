"use strict";

let validateCustomerInfo = () =>{
    //declare the regular expressions
    const emailRegex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    
    //grab the values from the fields 
    const password = document.getElementById("password").value;
    const confirmPass = document.getElementById("confirm").value;
    const email = document.getElementById("email").value;
    
    //test password
    if(!passwordRegex.test(password)){
        alert('Invalid password. Please follow requirements');
        event.preventDefault();
        return false;
    }
    
    //test the email
    if(!emailRegex.test(email)){
        alert('Invalid email entered. Please try again.');
        event.preventDefault();
        return false;
    }
    
    //check if passwords match
    if(password !== confirmPass){
        alert("The entered passwords did not match!");
        event.preventDefault();
        return false;
    }

    return true;
   
};

let validateBillingAddress = () =>{
    //declare the regular expressions
    const zipRegex = /^\d{5}(-\d{4})?(?!-)$/;
    const phoneRegex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/gm;
    
    //get values from billing boxes
    const zip = document.getElementById('b_zip').value;
    const phone = document.getElementById('b_phone').value;
    
    //test the zip code against regex
    if(!zipRegex.test(zip)){
        event.preventDefault();
        alert("Invalid zip code entered. Please try again...");
        return false;
    }
    
    //test the phone number with regex
    if(!phoneRegex.test(phone)){
        event.preventDefault();
        alert("Invalid phone number entered. Please try again...");
        return false;
    }
    
    return true;
};

let validateShippingAddress = () =>{
    
    //declare our regular expressions
    const zipRegex = /^\d{5}(-\d{4})?(?!-)$/;
    const phoneRegex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/gm;
    
    //get values from the shipping boxes
    const zip = document.getElementById('s_zip').value;
    const phone = document.getElementById('s_phone').value;
    
    //test the zip code against regex
    if(!zipRegex.test(zip)){
        event.preventDefault();
        alert("Invalid zip code entered. Please try again...");
        return false;
    }
    
    //test the phone number with regex
    if(!phoneRegex.test(phone)){
        event.preventDefault();
        alert("Invalid phone number entered. Please try again...");
        return false;
    }
    
    return true;
};



document.addEventListener("DOMContentLoaded", function () {
  // Add event listeners to trigger functions
  const customerInfoForm = document.getElementById("customer_form");
  const billingAddressForm = document.getElementById("billing_form");
  const shippingAddressForm = document.getElementById("shipping_form");

  //add event listeners to the form submission to test before info is sent to index.php
  customerInfoForm.addEventListener("submit", validateCustomerInfo);
  billingAddressForm.addEventListener("submit", validateBillingAddress);
  shippingAddressForm.addEventListener("submit", validateShippingAddress);
});