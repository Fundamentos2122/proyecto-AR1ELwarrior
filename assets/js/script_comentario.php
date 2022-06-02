<script>
const comList = document.getElementsByClassName("com-List")[0];
document.addEventListener("DOMContentLoaded", function(){
    //getArts();
});
function getArts() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php", true);

    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);

                getComs(list);
            }
            else {
                console.log("Error");
            }
        }
    };
    xhttp.send();
    return [];
}

function getComs(arts) {
    for(var i = 0; i < arts.lenght; i++){
        let xhttp = new XMLHttpRequest();
xhttp.open("GET", "../controllers/comentController.php?id=" + arts[i].id, true);
xhttp.onreadystatechange = function(){
    if (this.readyState === 4) {
        if (this.status === 200) {
            console.log(this.responseText);
            let list = JSON.parse(this.responseText);
           paintComs(arts[i].id);
        }
        else {
            console.log("Error");
        }
    }
};
xhttp.send();
    }
}

function paintComs(list,idpost) {
for(var i = 0; i < list.length; i++) {
    var post =  document.getElementById("com-List?id=" + idpost ); 
    post.innerHTML +=
    ` <div id="${list[i].id}" >
            <div class="comentario">Comentario de ${list[i].nombreuser} : <br> ${list[i].texto} </div>
            </div>`; 

// return [];
            // console.log("Hoka");
            // console.log(arte.imagen);         
}
    
}
</script>