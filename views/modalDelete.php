<div class="modal" id="modalDeleteArt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar Publicacion</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/postController.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿Seguro que desea elminiar esta publicacion?</p>
                    <input type="submit" value="Aceptar">
                </form>
            </div>
        </div>
    </div>
</div>