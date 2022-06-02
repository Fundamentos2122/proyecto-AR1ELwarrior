<script>
const artList = document.getElementById("art-List");

document.addEventListener("DOMContentLoaded", function() {
    getArts();
});

function paintArts(list) {
    let html = '';
    var user = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    for(var i = 0; i < list.length; i++) {
            if(user.nombre === list[i].nombre){
            html += 
            `<div><img class="imgg" src=" data:image/jpeg;base64,${list[i].imagen}"></div>`;
        }                
    }
        artList.innerHTML = html;
}

function hideDelete() {
    let btnDelete = document.querySelectorAll("button[onclick^='deleteArt']");

    btnDelete.forEach(btn => btn.remove());
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

function deleteArt(id) {
    idDelete.value = id;

    modalDeleteArt.classList.add("show");
}

function editArt(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let art = JSON.parse(this.responseText);

                idEdit.value = tweet.id;
                textAreaEdit.value = art.text;

                btnSaveEdit.setAttribute("onclick", "saveEdit(" + art.id + ")");
                modalArt.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}

function saveEdit(id) {
}
</script>