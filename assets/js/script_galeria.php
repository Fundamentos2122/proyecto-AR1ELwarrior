
<script>
const artList = document.getElementById("art-List");

document.addEventListener("DOMContentLoaded", function() {
    getArts();
});

function paintArts(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {
        // console.log(name); 
        if(window.location.toString().includes("search5")){ 
        if( list[i].genero === "fanart"){
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        }
        } else if(window.location.toString().includes("search4")){ 
        if( list[i].genero === "pixelart"){
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        }
        }  
        else if(window.location.toString().includes("search3")){ 
        if( list[i].genero === "comic"){
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        }
        }
        else if(window.location.toString().includes("search2")){ 
        if( list[i].genero === "digital"){
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        }
        }
        else if(window.location.toString().includes("search1")){ 
        if( list[i].genero === "3d"){
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        }
        }
        else if(window.location.toString().includes("search0")){ 
            html += 
            `<img class="img1" src=" data:image/jpeg;base64,${list[i].imagen}" alt="">`;
        } 
        }
        artList.innerHTML = html;
}

function getArts() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php", true);

    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                //console.log(this.responseText);
                let list = JSON.parse(this.responseText);

                paintArts(list);
            }
            else {
                console.log("Error");
            }
        }
    };
    xhttp.send();
    return [];
}

</script>