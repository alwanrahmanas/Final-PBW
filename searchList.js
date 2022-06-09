var keyword = document.getElementById("keyword");
var search = document.getElementById("search");
var container = document.getElementById("container");

//console.log("ajax berhasil");
keyword.addEventListener("keyup", function(){

    //buat objek ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
            //console.log("xhr.responseText: " + xhr.responseText);
        }
    }

    //ekesekusi ajax
    xhr.open("GET", "search.php?keyword="+keyword.value, true);
    xhr.send();
});