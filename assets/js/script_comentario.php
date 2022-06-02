<script>
const comList = document.getElementsByClassName("com-List")[0];

document.addEventListener("DOMContentLoaded", function(){
    getComs();
});

function getComs() {
    let xhttp = new XMLHttpRequest();

xhttp.open("GET", "../controllers/comentController.php", true);

xhttp.onreadystatechange = function(){
    if (this.readyState === 4) {
        if (this.status === 200) {
            console.log(this.responseText);
            let list = JSON.parse(this.responseText);
           paintComs(list);
        }
        else {
            console.log("Error");
        }
    }
};
xhttp.send();
return [];
}

function paintComs(list) {

let html = '';
var post = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
globalThis.comentario;
for(var i = 0; i < list.length; i++) {
    let xhttp = new XMLHttpRequest();

xhttp.open("GET", "../controllers/postController.php?id=" + list[i].idpost, true);

xhttp.onreadystatechange = function(){
    if (this.readyState === 4) {
        if (this.status === 200) {
            // console.log(this.responseText);
            comentario = JSON.parse(this.responseText);
            if(post.id === list[i].idpost){
            html += 
            `<div id="${list[i].id}" >
            <div class="comentario">Comentario de ${list[i].nombreuser} : <br> ${comentario.texto} </div>
            </div>`;   
            }        
        }
        else {
            console.log("Error");
        }
    }
    comList.innerHTML = html;
};

xhttp.send();

// return [];
            // console.log("Hoka");
            // console.log(arte.imagen);         
}
    
}
</script>