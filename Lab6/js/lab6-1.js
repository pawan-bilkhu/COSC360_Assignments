/* jQuery and JavaScript code here for lab6-1.html */
$(document).ready(function() {
    $('#pageTitle').html("Lab 6 - DOM Manipulation with jQuery");
    $('button').css('background-color', 'red');
    $('#msgArea').val("My class is " + $('#msgArea').attr("class") );
    $('body').css('background-color', 'ivory');
    $('.center-icons').addClass('selected');
});
