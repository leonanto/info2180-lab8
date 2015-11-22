window.onload = function(){
    document.getElementById("lookup").addEventListener(
        "click", function(){
             var text = document.getElementById("term").value;
             var check = document.getElementById("check").checked;
             console.log(check+""+text);
            if(text == "" && check == true){
               new Ajax.Request("world.php?all=true&format=xml",
               {
                    method: "get",
                    onSuccess: showResults
               }); 
            }
            else{
               new Ajax.Request("world.php?lookup="+text+"&all=false",
               {
                    method: "get",
                    onSuccess: showResults
               });
            } 
        });
        function showResults(data){
            alert(data.responseXML);
            //var div = document.getElementById("result");
            //div.innerHTML = div.innerHTML + data.responseText; 
        }
};