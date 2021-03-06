/*const formTweet = document.getElementById("form-tweet");
const modalTweet = document.getElementById("modalTweet");
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idEdit = document.getElementById("form-edit-id");
const idDelete = document.getElementById("form-delete-id");
const textAreaEdit = document.getElementById("form-edit-text");
const btnSaveEdit = document.getElementById("btnSaveEdit");
const keyList = "tweetList";*/

const artList = document.getElementById("artList");

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
    // formTweet.addEventListener("submit", submitTweet);

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
    //var usuario =  echo json_encode($_SESSION, JSON_HEX_TAG);
    for(var i = 0; i < list.length; i++) {
        // console.log(name);
        if(usuario.type === "normal"){
            if(usuario.nombre === list[i].nombre){
            html += 
            `<div id= " ${list[i].id}">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy2.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
                <div><img class="profimg" src="../imgs/edit.png" alt=""></div>
            </div>
            <div class="info4">
                <div class="mensaje"> ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="${list[i].imagen}" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <div class="info5">
                <div class="comentario"> wow esta increible</div>
            </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
            </div>`;
        }
        else{
            html += 
            `<div id= " ${list[i].id}">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy2.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
            </div>
            <div class="info4">
                <div class="mensaje"> ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="${list[i].imagen}" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <div class="info5">
                <div class="comentario"> wow esta increible</div>
            </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
            </div>`;
        }
        }
        else{
            if(usuario.nombre === list[i].nombre){
            html += 
            `<div id= " ${list[i].id}">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy2.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
                <div><img class="profimg" src="../imgs/edit.png" alt=""></div>
                <div><img class="profimg" src="../imgs/cerrar.png" alt=""></div>
            </div>
            <div class="info4">
                <div class="mensaje"> ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="${list[i].imagen}" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <div class="info5">
                <div class="comentario"> wow esta increible</div>
            </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
            </div>`;
        }
        else{
            html += 
            `<div id= " ${list[i].id}">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy2.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
                <div><img class="profimg" src="../imgs/edit.png" alt=""></div>
                <div><img class="profimg" src="../imgs/cerrar.png" alt=""></div>
            </div>
            <div class="info4">
                <div class="mensaje"> ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="${list[i].imagen}" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <div class="info5">
                <div class="comentario"> wow esta increible</div>
            </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
            </div>`;
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

    xhttp.open("GET","../controllers/postController.php",true);

    xhttp.onreadystatechange = function() {
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