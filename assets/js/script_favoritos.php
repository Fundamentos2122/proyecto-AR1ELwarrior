<script>
const favList = document.getElementById("favList");

document.addEventListener("DOMContentLoaded", function() {
    getFavs();
});

function paintFavs(list) {

    let html = '';
    var user = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    globalThis.arte;
    for(var i = 0; i < list.length; i++) {
        let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php?id=" + list[i].idimg, true);

    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                // console.log(this.responseText);
                arte = JSON.parse(this.responseText);
                html += 
            `<div><img class="imgg" src="data:image/jpeg;base64,${arte.imagen}"></div>`;           
            }
            else {
                console.log("Error");
            }
        }
        favList.innerHTML = html;
    };
    
    xhttp.send();

    // return [];
                // console.log("Hoka");
                // console.log(arte.imagen);         
    }
        
}


function getFavs() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/favoritoController.php", true);

    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);
               paintFavs(list);
            }
            else {
                console.log("Error");
            }
        }
    };
    xhttp.send();
    return [];
}

function deleteFav(id) {
    idDelete.value = id;

    modalDeleteFav.classList.add("show");
}

function editFav(id) {
}

function saveEdit(id) {
}
</script>