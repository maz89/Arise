<div class="modal fade" id="addPosition" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Position </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />


                  
                 
                    
 <div class="mb-3">
                        <label for="phone-field" class="form-label">Job title     </label>
                        <input type="text" id="job_title" name="job_title" class="form-control" placeholder="job title   "  />

                          <span class="text-danger" id="erreurJobTitle">  </span>
                      

                    </div>

                      <div class="mb-3">
                        <label for="phone-field" class="form-label">Job french     </label>
                        <input type="text" id="job_french" name="job_french" class="form-control" placeholder="job  french    "  />

                         
                      

                    </div>



                   

                 

                </div>
                <input type="hidden" id="idPosition">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterPosition"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updatePosition"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
