<div class="modal" id="modalPostEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar publicacion</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/postControlers.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>BORRAR ESTA PUBLICACION?</p>
                    <input type="submit" value="Aceptar">
                </form>
            </div>
        </div>
    </div>
</div>