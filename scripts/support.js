

//When dom is loaded. 
$(document).ready(function() {
    // Initialize the jQuery Accordion
    $("#accordion").accordion({
        heightStyle: "content", 
        collapsible: true,
        // Start with all answers closed
        active: false 
        
    });

    // Set focus on the first accordion header
    $("#accordion h3").first().focus();
});