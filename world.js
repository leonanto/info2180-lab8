window.onload = function(){
    document.getElementById("lookup").addEventListener(
        "click", function(){
             var text = document.getElementById("term").value;
             var check = document.getElementById("check").value;
             //console.log(check+""+text+""+"all");
            if(text == "" && check == "all"){
               new Ajax.Request("world.php?lookup="+text+"&all=true",
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
            alert(data.responseText);
            //var div = document.getElementById("result");
            //div.innerHTML = div.innerHTML + data.responseText; 
        }
};