
<!-- Default Size -->
<div class="modal animated fadeIn" id="addContractType" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Contract Type    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Libelle <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="libelle" name="libelle">
                            </div>

                             <span class="text-danger" id="erreurLibelle">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idContractType">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterContractType">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateContractType">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerContractType">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
