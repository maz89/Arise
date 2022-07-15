<div class="modal fade" id="addContinent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Continent </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <input type="hidden" id="id-field" />





                    <div class="mb-3">
                        <label for="email-field" class="form-label">Libelle  </label>
                        <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Title  Continent "  />
                        <span class="text-danger" id="erreurLibelle">  </span>


                    </div>


                </div>
                <input type="hidden" id="idContinent">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel </button>
                        <button type="submit" class="btn btn-success" id="ajouterContinent"><i class="ri-save-line align-bottom me-1"></i>Add   </button>
                        <button type="button" class="btn btn-success" id="updateContinent"><i class="ri-save-line align-bottom me-1"></i>Update  </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
