<script>
//const formArt = document.getElementById("form-art");
/*const modalTweet = document.getElementById("modalTweet");
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idEdit = document.getElementById("form-edit-id");
const idDelete = document.getElementById("form-delete-id");
const textAreaEdit = document.getElementById("form-edit-text");
const btnSaveEdit = document.getElementById("btnSaveEdit");*/
//const keyList = "artList";

const artList = document.getElementById("art-List");

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
     //formArt.addEventListener("submit", submitArt);

    getArts();

    //let modals = document.getElementsByClassName("modal");

    /*for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }*/

    // btnSaveEdit.addEventListener("click", saveEdit);
});

function paintArts(list) {
    let html = '';
    var usuario = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    for(var i = 0; i < list.length; i++) {
        // console.log(name);
     if(usuario.type === "admin"){
            if(usuario.nombre === list[i].nombre){
            html += 
            `       <div> ${list[i].nombre}</div> `;
        }
        }
        else{
            if(usuario.nombre === list[i].nombre){
            html += 
            `<div> ${list[i].nombre}</div> `;
        }          
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

    xhttp.open("GET", "../controllers/usersController.php", true);

    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
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
    // let xhttp = new XMLHttpRequest();

    // xhttp.open("POST", "../controllers/tweetsController.php", true);

    // xhttp.setRequestHeader("Content-type", "application/json");

    // xhttp.onreadystatechange = function() {
    //     if (this.readyState === 4) {
    //         if (this.status === 200) {
    //             if (this.responseText === "Registro guardado") {
    //                 getTweets();
    //                 modalTweet.classList.remove("show");
    //             }
    //         }
    //         else {
    //             console.log("Error");
    //         }
    //     }
    // };

    // let data = {
    //     _method: 'PUT',
    //     id: id,
    //     text: textAreaEdit.value
    // };

    // xhttp.send(JSON.stringify(data));
}
</script>