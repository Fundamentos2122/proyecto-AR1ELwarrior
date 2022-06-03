<div class="modal" id="modalDeleteFav">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>ELIMINAR FAVORITOS</h2>
            </div>
            <div class="modal-body">
                 <form  method="POST"> 
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="id" id="form-delete-id">
                    <p>¿Desea eliminar de favoritos?</p>
                    <input onclick="deleteFav2();" type="submit" value="Aceptar">
                </form>
            </div>
        </div>
    </div>
</div>