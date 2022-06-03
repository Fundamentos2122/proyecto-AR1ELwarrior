<script>
const favList = document.getElementById("favList");
const formFav = document.getElementById("form-fav");
const modalFav = document.getElementById("modalFav");
const modalDeleteFav = document.getElementById("modalDeleteFav");
const idDelete = document.getElementById("form-delete-id");

document.addEventListener("DOMContentLoaded", function() {
    getFavs();
    let modals = document.getElementsByClassName("modal");
    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }
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
                 //console.log(this.responseText);
                arte = JSON.parse(this.responseText);
                //console.log(arte.id);
                html += 
            `<div class="options">
                <button class=\"btn-option\" onclick=\"deleteFav2(${arte.id})\">
                        <i class=\"fa-solid fa-xmark\"></i>
                </button>
                </div>
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${arte.imagen}" alt=""></div>`;           
            }
            else {
                console.log("Error");
            }
        }
        favList.innerHTML = html;
    };
    
    xhttp.send();    
    }
        
}

function hideDelete() {
     let btnDelete = document.querySelectorAll("button[onclick^='deleteFav']");
     btnDelete.forEach(btn => btn.remove());
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

// function deleteFav(ad) {
//     id = ad;
//     modalDeleteFav.classList.add("show");
// }

function deleteFav2(id){
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST","../controllers/favoritoController.php",true);
    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
               
            }
            else {
                console.log("Error");
            }
        }
    };
    let data= {
        _method:'DELETE',
        id:id
    };
    xhttp.send(JSON.stringify(data));
    location.reload();

}

function editFav(id) {
}

function saveEdit(id) {
}
</script>