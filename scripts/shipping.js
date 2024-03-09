"use strict";

//Calculate function, parses the input in cost box, calls calculateShipping
//Then sets the correct value total to the total box
let calculate = () =>{
    let cost =  parseFloat(document.getElementById("cost").value);
    //console.log(cost);
    
    if(!isNaN(cost) && cost > 0){
        let total = calculateShipping(cost);
        //set the result box to the total rounded to 2 decimal places.
        document.getElementById("result").value = total.toFixed(2);
    }
    else{
        if(isNaN(cost)){
           alert("Product cost input was not a number!");
        }
        else{
            alert("Product cost input must be greater than zero!");
        }
        
    }   
};

//Calculate shipping function, takes in cost, multiplies 
let calculateShipping = (cost) =>{
    //this will be percent times 100 for easier to read math.
    let percentMult;
       
    //switch case to set percent multiplier to the right value
    switch(true){
        case(cost <= 50):
            percentMult = 1.20;
            break;
        case(cost <= 200 && cost > 50):
            percentMult = 1.18;
            break;
        case(cost <= 500 && cost > 200):
            percentMult = 1.15;
            break;
        case(cost <= 1000 && cost > 500):
            percentMult = 1.12;
            break;
        case(cost > 1000):
            percentMult = 1.08;
            break;
        default:
            break;        
    }

    //return the percent mult and cost, same as (cost * percent) + cost
    return percentMult * cost;
};


document.addEventListener("DOMContentLoaded", () => {  
    //move focus to product cost textbox
    document.getElementById("cost").focus();  
    
    //add event listener
    document.getElementById("submit").addEventListener("click", calculate);
});