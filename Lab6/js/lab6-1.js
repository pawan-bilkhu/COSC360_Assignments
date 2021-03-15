/* jQuery and JavaScript code here for lab6-1.html */
$(document).ready(function() {
    $('#pageTitle').html("Lab 6 - DOM Manipulation with jQuery");
    $('button').css('background-color', 'red');
    var msgArea = $('#msgArea');
    msgArea.val("My class is " + msgArea.attr("class") );
    $('body').css('background-color', 'ivory');
    $('.center-icons').addClass('selected');

    var panel1 = $('.panel');
    var panel2 = $('#panel-2');
    panel1.click(function() {
        $("#message").html("You clicked in the panel");
    });
    panel2.after("<span id='message2'></span>")
    panel2.mousemove(function (event) {
        $('#message2').html("x=" + event.pageX + " y=" + event.pageY );
    })
    panel2.mouseleave(function () {
        $('#message2').html("The mouse has left.");
    })
    var img = $('<img src="images/art/thumbs/13030.jpg" >');
    panel2.append(img);

    var panelImage = $('#stories img');
    panelImage.mouseover(function(event){
        // construct preview filename based on existing img
        var alt = $(this).attr('alt');
        var src = $(this).attr('src');
        var newsrc = src.replace("small","medium");
        // make dynamic element with larger preview image and caption
        var preview = $('<div id="preview"></div>');
        var image = $('<img src="' + newsrc + '">');
        var caption = $('<p>' + alt + '</p>');
        preview.append(image);
        preview.append(caption);
        $(this).after(preview);
        $(this).addClass("gray");
        $('#preview').fadeIn(1000);
    })
    panelImage.mouseleave(function (){
        var preview = $('#preview');
        $(this).removeClass("gray");
        preview.remove();
    });

});
