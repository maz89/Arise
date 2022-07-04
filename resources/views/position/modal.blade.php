
<!-- Default Size -->
<div class="modal animated fadeIn" id="addPosition" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Position    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Job title  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="job_title" name="job_title">
                            </div>

                             <span class="text-danger" id="erreurJobTitle">  </span>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Job french   </label>
                                <input class="form-control" type="text" id="job_french" name="job_french">
                            </div>


                        </div>


                    </div>




                    <input type="hidden" id="idPosition">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterPosition">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updatePosition">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerPosition">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
