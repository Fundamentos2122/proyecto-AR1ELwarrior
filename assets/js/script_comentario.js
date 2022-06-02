const comList = document.getElementById("com-List");

document.addEventListener("DOMContentLoaded", function() {
    getComs();
});

function paintComs(list) {
    let html = '';
        // console.log(name); 
    for(var i = 0; i < list.length; i++) {
            html += 
            `<div id="${list[i].id}" >
            <div class="comentario">Comentario de ${list[i].nombreuser} : <br> ${list[i].texto} </div>
            </div>`;            
    }
        comList.innerHTML = html;
}

function getComs() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/comentController.php", true);
    xhttp.onreadystatechange = function(){
        if (this.readyState === 4) {
            if (this.status === 200) {
                //console.log(this.responseText);
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
