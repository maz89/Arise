<div class="modal fade" id="addTask" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Task </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />





 <div class="mb-3">
                        <label for="phone-field" class="form-label">Name   </label>
                        <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Libelle    "  />

                          <span class="text-danger" id="erreurLibelle">  </span>


                    </div>


                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Date   </label>
                        <input type="date" id="date_task" name="date_task" class="form-control" placeholder="Date task     "  />

                          <span class="text-danger" id="erreurDate_task">  </span>


                    </div>

                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Description   </label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Description     "  />

                          <span class="text-danger" id="erreurDescription">  </span>


                    </div>



                      <div class="mb-3">
                        <label for="phone-field" class="form-label">Status  </label>
                       <select class="form-control form-select"  name="accomplie" id="accomplie" style="width: 100%; height:36px;">
                                    <option value="0">    </option>

                                    <option value="{{\App\Types\StatutTask::EN_COURS}}"> En cours     </option>
                                    <option value="{{\App\Types\StatutTask::ANNULE}}"> Annulé      </option>
                                    <option value="{{\App\Types\StatutTask::TERMINE}}"> Terminé       </option>





                                </select>

                       <span class="text-danger" id="erreurAccomplie">  </span>

                    </div>







                </div>
                <input type="hidden" id="idTask">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterTask"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateTask"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
