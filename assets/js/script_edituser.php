
<script>
const userList = document.getElementById("art-List");

document.addEventListener("DOMContentLoaded", function() {
    getArts();
});

function getUser() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/usersController.php", true);

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
</script>