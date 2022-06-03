<script>
    textAreaEdit = document.getElementsByClassName("form-control")[0];
    var usuario = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../controllers/usersController.php?id=" + usuario.id, true);
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let user = JSON.parse(this.responseText);
                textAreaEdit.value = user.nombre;
            }
            else {
                console.log("Error");
            }
        }
    };
    xhttp.send();
</script>