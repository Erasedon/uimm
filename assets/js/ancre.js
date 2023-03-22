$(".plusinfo").click(function(){
    var ancre = $(this).attr("href");
    $("html, body").animate({
        scrollTop : $(ancre).offset().top 
    }, "slow");
 
    return false;
});