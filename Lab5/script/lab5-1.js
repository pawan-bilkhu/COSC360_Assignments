function setBackgroundColor(e){
    e.style.backgroundColor = "red";
}
function removeBackgroundColor(e){
    e.style.backgroundColor = "white";

}
function clearField(e){
        e.target.style.backgroundColor = "white";
}
window.addEventListener("load", function(){
    var cssSelector = "input[type=text], textarea, input[type=checkbox], input[type=color], " +
        "input[type=time], input[type=date]";
    var fields = document.querySelectorAll(cssSelector);
    for(i=0;i<fields.length; i++)
    {
        fields[i].addEventListener("input", clearField)
    }
})

window.addEventListener("submit", function(e){
    var validForm = true;
    var cssSelector = "input[type=text], textarea, input[type=checkbox]";
    var checkedBox = "input[name=accept]";
    var checkfield = document.querySelector(checkedBox);
    var fields = document.querySelectorAll(cssSelector);
    for(i=0; i<fields.length;i++)
    {

        if (fields[i].value == null || fields[i].value === '')
        {
            setBackgroundColor(fields[i]);
            validForm = false;
        }
        else{
            removeBackgroundColor(fields[i]);
        }
    }
    if(!checkfield.checked){
        window.alert("Please accept the software license agreement and fill in any missing fields.");
        validForm = false;
    }
    if(!validForm){
        e.preventDefault();
        return false;
    }
    else
    {
        return true;
    }
})