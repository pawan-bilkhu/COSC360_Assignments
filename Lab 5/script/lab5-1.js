var submit = document.getElementsByClassName("rounded").item(0);
submit.addEventListener("empty", emptyField)

function emptyField()
{

    var title = document.forms["mainForm"]["title"].value;
    if(isNaN(title))
        window.alert("OOPS");
        event.preventDefault;
}
emptyField()