<script>
const formArt = document.getElementById("form-art");
const modalArt = document.getElementById("modalArt");
const modalDeleteArt = document.getElementById("modalDeleteArt");
const idEdit = document.getElementById("form-edit-id");
const idDelete = document.getElementById("form-delete-id");
const textAreaEdit = document.getElementById("form-edit-text");
const btnSaveEdit = document.getElementById("btnSaveEdit");
const keyList = "artList";

const artList = document.getElementById("art-List");

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
     //formArt.addEventListener("submit", submitArt);

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
function paintArts(list) {
    let html = '';
    var usuario = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    for(var i = 0; i < list.length; i++) {
        // console.log(name);

     if(usuario.type === "admin"){
            if(usuario.nombre === list[i].nombre){
            html += 
            `<div class="sub-container" ${list[i].id}>
            
            <div class="info2">
                <div><img class="profimg" src="../imgs/pimg.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">YOUR PROFFILE</button>
                <div class="options">
                <button class="btn-option" onclick="editArt(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                <button class=\"btn-option\" onclick=\"deleteArt(${list[i].id})\">
                        <i class=\"fa-solid fa-xmark\"></i>
                </button>
                </div>
            </div>
            <div class="info4">
                <div class="mensaje">  ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${list[i].imagen}" alt=""></div>
                <div class="interact">
                <form class="add" id="form-fav" action="../controllers/favoritoController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="idpost" value="${list[i].id}">
                <input class="intitem" type="image"  src="../imgs/like.png" width="100px" alt="Submit">
                </form>
                <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>
                    <form class="add" id="form-com" action="../controllers/comentController.php" method="POST" enctype="multipart/form-data">
                    <input class="intitem" type="image"  src="../imgs/comment.png" width="100px" alt="Submit">
                    <div>
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="${list[i].id}">
                    <input name= "texto" class="comment" type="text" placeholder="Add a comment" width="50%"> </input>
                    </div>
                    </form>
                </div>
                    <div class="info5"><div id= "com-List" class="comentario"> </div>  </div>  
                </div> 
            </div>`;
        }
        else{
            html += 
           `<div class="sub-container" ${list[i].id}>
            
            <div class="info2">
                <div><img class="profimg" src="../imgs/pimg.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <div class="options">
                <button class=\"btn-option\" onclick=\"deleteArt(${list[i].id})\">
                        <i class=\"fa-solid fa-xmark\"></i>
                </button>
                </div>
                    </div>
                    <div class="info4">
                <div class="mensaje">  ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${list[i].imagen}" alt=""></div>
                <div class="interact">
                <form class="add" id="form-fav" action="../controllers/favoritoController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="idpost" value="${list[i].id}">
                <input class="intitem" type="image"  src="../imgs/like.png" width="100px" alt="Submit">
                </form>
                <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>
                    <form class="add" id="form-com" action="../controllers/comentController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="${list[i].id}">
                    <input class="intitem" type="image"  src="../imgs/comment.png" width="100px" alt="Submit">
                    <div>
                    <input name= "texto" class="comment" type="text" placeholder="Add a comment" width="50%"> </input>
                    </div>
                    </form>
                </div>
                    <div class="info5"><div id= "com-List" class="comentario"> </div>  </div>  
                </div> 
            </div>`;
        }
        }
        else{
            if(usuario.nombre === list[i].nombre){
            html += 
            `<div class="sub-container" ${list[i].id}>
            
            <div class="info2">
                <div><img class="profimg" src="../imgs/pimg.jpg" alt=""></div>
                <div> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
                <div class="options">
                <button class="btn-option" onclick="editArt(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="info4">
                <div class="mensaje">  ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${list[i].imagen}" alt=""></div>
                <div class="interact">
                <form class="add" id="form-fav" action="../controllers/favoritoController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="idpost" value="${list[i].id}">
                <input class="intitem" type="image"  src="../imgs/like.png" width="100px" alt="Submit">
                </form>
                <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>
                    <form class="add" id="form-com" action="../controllers/comentController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="${list[i].id}">
                    <input class="intitem" type="image"  src="../imgs/comment.png" width="100px" alt="Submit">
                    <div>
                    <input name= "texto" class="comment" type="text" placeholder="Add a comment" width="50%"> </input>
                    </div>
                    </form>
                </div>
                    <div class="info5"><div id= "com-List" class="comentario"> </div>  </div>  
                </div> 
            </div>`;
        }
        else{
            html += 
            `<div class="sub-container" ${list[i].id}>
            
            <div class="info2">
                <div><img class="profimg" src="../imgs/pimg.jpg" alt=""></div>
                <div name= nombreuser> ${list[i].nombre}</div>
                <button class="follow">FOLLOWING</button>
            </div>
            <div class="info4">
                <div class="mensaje">  ${list[i].descripcion}</div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${list[i].imagen}" alt=""></div>
                <div class="interact">
                <form class="add" id="form-fav" action="../controllers/favoritoController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="idpost" value="${list[i].id}">
                <input class="intitem" type="image"  src="../imgs/like.png" width="100px" alt="Submit">
                </form>
                <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>
                    <form class="add" id="form-com" action="../controllers/comentController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="${list[i].id}">s
                    <input class="intitem" type="image"  src="../imgs/comment.png" width="100px" alt="Submit">
                    <div>
                    <input name= "texto" class="comment" type="text" placeholder="Add a comment" width="50%"> </input>
                    </div>
                    </form>
                </div>
                    <div class="info5"> <div id= "com-List" class="comentario"> </div>  </div>  
                </div> 
            </div>`;
        }
            
        }      
    }
        artList.innerHTML = html;
        
}
function hideEdit(){
    let btnEdit = document.querySelectorAll("button[onclick^='editArt']");

    btnEdit.forEach(btn => btn.remove());
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
                idEdit.value = art.id;
                textAreaEdit.value = art.descripcion;
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
                getTweets();
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
</script>