const formArt = document.getElementById("form-artt");
const artList = document.getElementById("art-list");
const modalArt = document.getElementById("modalArt");
const modalDeleteArt = document.getElementById("modalDeleteArt");
const idEdit = document.getElementById("form-edit-id");
const idDelete = document.getElementById("form-delete-id");
const textAreaEdit = document.getElementById("form-edit-text");
const btnSaveEdit = document.getElementById("btnSaveEdit");
const keyList = "artList";

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
    // formTweet.addEventListener("submit", submitTweet);

    getArts();

    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }

    // btnSaveEdit.addEventListener("click", saveEdit);
});

function submitArts(e) {
    e.preventDefault();
    e.stopPropagation();

    let art = {
        id: Date.now(),
        text: formArt["art"].value
    };

    let list = getArts();

    list.push(art);

    localStorage.setItem(keyList, JSON.stringify(list));

    paintArts();
}

function paintArts(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {
        html += `<div class="info2" id="${list[i].id}">
        <div><img class="profimg" src="../imgs/wy.jpg" alt=""></div>
        <div>  ${list[i].creador}</div>
        <button class="follow">+FOLLOW</button>
        <div class="btn-option" onclick="editArt(${list[i].id})"><img class="profimg" src="../imgs/edit.png" alt=""></div>
        <div class=\"btn-option\" onclick=\"deleteArt(${list[i].id})"><img class="profimg" src="../imgs/cerrar.png" alt=""></div>
    </div>
    <div class="info3">
        <div  class="img" ><img class="img" src=" ${list[i].imagen}" alt=""></div>
        <div class="interact">
            <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
            <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
            <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
        </div>
        <input class="comment" type="text" placeholder=" ${list[i].comentario}"> </input>

    </div>`;
    }

    artList.innerHTML = html;
}

function getArts() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
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

function deleteArts(id) {
    idDelete.value = id;

    modalDeleteArts.classList.add("show");
}

function editArts(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/postController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let art = JSON.parse(this.responseText);

                idEdit.value = art.id;
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
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controllers/postController.php", true);

    xhttp.setRequestHeader("Content-type", "application/json");

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                if (this.responseText === "Registro guardado") {
                    getaRTS();
                    modalArt.classList.remove("show");
                }
            }
            else {
                console.log("Error");
            }
        }
    };

    let data = {
        _method: 'PUT',
        id: id,
        text: textAreaEdit.value
    };

    xhttp.send(JSON.stringify(data));
}