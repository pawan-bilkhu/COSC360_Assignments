function setBackgroundColor(e){
    e.style.backgroundColor = "red";
}
function removeBackgroundColor(e){
    e.style.backgroundColor = "black";
}
function highlightField(e){
    if(e.type=="focus"){
        e.target.style.backgroundColor = "#FFE393";
    }
    if(e.type=="blur"){
        e.target.style.backgroundColor = "white";
    }
}
window.addEventListener("load", function(){
    var cssSelector = "input[type=text], textarea, ";
    var fields = document.querySelectorAll(cssSelector);
    for(i=0;i<fields.length; i++)
    {
        fields[i].addEventListener("focus", highlightField);
        fields[i].addEventListener("blur", highlightField);
    }
})
// Trying to use the mainForm to check on submit didn't work, and kept throwing an error
var mainForm = document.getElementById("mainForm")

window.addEventListener("submit", function(e){
    var validFrom = true;
    var cssSelector = "input[type=text], textarea";
    var fields = document.querySelectorAll(cssSelector);
    for(i=0; i<fields.length;i++)
    {
        // window.alert(fields[i].value);
        if (fields[i].value == null || fields[i].value == '')
        {
            setBackgroundColor(fields[i]);
            validFrom = false;
        }
        else{
            setBackgroundColor(fields[i]);
        }
    }
    if(!validFrom){
        e.preventDefault();
        return false;
    }
    else
    {
        return true;
    }
})