function childTraverse(entry){
        if(entry.hasChildNodes())
        {
            var childNode = entry.childNodes;
            childNode.forEach(childTraverse);

        }
        if(entry.nodeType !== 3) {
                var span = document.createElement("span");
                var text = document.createTextNode(entry.tagName);
                span.classList.add("hoverNode");
                span.append(text);
                span.addEventListener("click", function(){
                    window.alert("innerHTML: " + entry.innerHTML + "\nID: " + entry.nodeName)
                });

                // console.log(entry);
                entry.appendChild(span);
        }
}
window.addEventListener("load", function(e){
    var elements = document.body.childNodes;
    elements.forEach(childTraverse);
});