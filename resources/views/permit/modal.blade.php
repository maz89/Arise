<div class="modal fade" id="addPermit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Permit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />


                  
                   <div class="mb-3">
                        <label for="phone-field" class="form-label">Traveler    </label>
                         <select class="form-control form-select"  name="traveler_id" id="traveler_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $travelers = App\Models\Traveler::allTravelerActifs();

                                    @endphp



                                    @foreach( $travelers  as $traveler )

                                        <option value="{{$traveler->id}}">{{$traveler->firstname .' '.$traveler->lastname  }}</option>


                                    @endforeach



                                </select>

                          <span class="text-danger" id="erreurTraveler">  </span>
                      

                    </div>   

                    
 <div class="mb-3">
                        <label for="phone-field" class="form-label">Validity    </label>
                        <input type="date" id="validity" name="validity" class="form-control" placeholder="Date of validity  "  />

                          <span class="text-danger" id="erreurValidity">  </span>
                      

                    </div>

                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Validity    </label>
                        <input type="text" id="expiry" name="expiry" class="form-control" placeholder="Date of expiry   "  />

                          <span class="text-danger" id="erreurExpiry">  </span>
                      

                    </div>



                   

                 

                </div>
                <input type="hidden" id="idPermit">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterPermit"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updatePermit"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
