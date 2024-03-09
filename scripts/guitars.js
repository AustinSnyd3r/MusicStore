"use strict";

//DOMCONTENT Loaded
$(document).ready(function(){
    //make the html "bxslider" into a slider with following properties
    $('.bxslider').bxSlider({
        //horizontal slider
        mode: 'horizontal', 
        //make slides change on their own
        auto: true,
        //3 seconds between each slide   
        pause: 3000,
        //make it start on random slide
        randomStart: true,
        //uses title on html image to make the banner style caption
        captions: true,
        //remove the arrows
        controls: false,
        //pager to display slideCount/totalSlides
        pager: true,
        pagerType: 'short'      
    });
});

