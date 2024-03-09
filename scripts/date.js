"use strict";

//had to remove the $ function to get Jquery to work. 

document.addEventListener("DOMContentLoaded", function() {
    let currentDate = new Date();
    let footer = document.querySelector("footer");
    
    //make the element for data and add the current data to it
    let date = document.createElement("p");
    date.textContent = currentDate.toLocaleDateString('en-US', 
                       {month: '2-digit', 
                       day: '2-digit', 
                       year:'numeric'});
    
    //append to the footer. 
    footer.appendChild(date);
});