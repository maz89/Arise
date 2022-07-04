
<!-- Default Size -->
<div class="modal animated fadeIn" id="addBusinesse" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Continent    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Code  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="code" name="code">
                            </div>

                             <span class="text-danger" id="erreurCode">  </span>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title   <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="title" name="title">
                            </div>

                            <span class="text-danger" id="erreurTitle">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idBusinesse">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterBusinesse">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateBusinesse">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerBusinesse">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
