$(document).mouseup(function(e) 
{
    var hidepopupall = $(".hidepopupall");
    if (!hidepopupall.is(e.target) && hidepopupall.has(e.target).length === 0) 
    {
        hidepopupall.hide();
    }
});