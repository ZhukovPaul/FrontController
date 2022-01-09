document.addEventListener("DOMContentLoaded", function onMainContentLoaded(){


    console.log('We\'are here!!! EEE!!' );
    var formFilter  = document.getElementById("filterForm");

    if(formFilter != undefined){

        formFilter.addEventListener("submit",function filterSubmitForm(e){
            
        var formData = new FormData(e.target);
        formData.append("action","JSON");
        formData.append("method","JSON");
        var xhr = new XMLHttpRequest();
        xhr.open( "POST",location.href );
        xhr.send(formData);
    
        xhr.onreadystatechange = function() { 
                if (xhr.status == 200) {
                document.getElementById("blogList").innerHTML = xhr.response;
                console.log(  xhr.response); // пример вывода: 404: Not Found
            } 
        };
        e.preventDefault()
        
        });
    }
    
      
  
});