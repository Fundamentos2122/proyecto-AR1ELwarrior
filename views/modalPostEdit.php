<div class="modal" id="modalArt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>EDITAR PUBLICACION</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/postController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-text" name="descripcion"></textarea>
                    <input type="submit" value="GUARDAR">
                </form>
            </div>
        </div>
    </div>
</div>