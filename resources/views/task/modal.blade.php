
<!-- Default Size -->
<div class="modal animated fadeIn" id="addTask" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add  task    </h3>
            </div>
            <div class="modal-body">


                <form>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="libelle" name="libelle">

                            </div>

                            <span class="text-danger" id="erreurLibelle">  </span>
                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="date_task" name="date_task">
                            </div>

                            <span class="text-danger" id="erreurDate_task">  </span>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="description" name="description">
                            </div>

                            <span class="text-danger" id="erreurDescription">  </span>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="accomplie" id="accomplie" style="width: 100%; height:36px;">
                                    <option value="0">    </option>

                                    <option value="{{\App\Types\StatutTask::EN_COURS}}"> En cours     </option>
                                    <option value="{{\App\Types\StatutTask::ANNULE}}"> Annulé      </option>
                                    <option value="{{\App\Types\StatutTask::TERMINE}}"> Terminé       </option>





                                </select>
                            </div>

                            <span class="text-danger" id="erreurAccomplie">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idTask">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterTask">Save </button>

                        <button class="btn btn-primary submit-btn" type="button" id="updateTask">Edit </button>


                        <button class="btn btn-danger submit-btn" type="button" id="annulerTask">Cancel</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
