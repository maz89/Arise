<div class="modal fade" id="addVaccine" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Vaccine </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />





 <div class="mb-3">
                        <label for="phone-field" class="form-label">Name </label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name    "  />

                          <span class="text-danger" id="rreurname">  </span>


                    </div>


                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Nb doses   </label>
                        <input type="text" id="nb_doses" name="nb_doses" class="form-control" placeholder="Doses     "  />

                          <span class="text-danger" id="erreurnb_doses">  </span>


                    </div>




                      <div class="mb-3">
                        <label for="phone-field" class="form-label">Disease  </label>
                       <select class="form-control form-select"  name="disease_id" id="disease_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $diseases = App\Models\Disease::allDiseaseActifs();

                                    @endphp



                                    @foreach( $diseases  as $disease )

                                        <option value="{{$disease->id}}">{{$disease->libelle  }}</option>


                                    @endforeach



                                </select>

                       <span class="text-danger" id="erreurdisease_id">  </span>

                    </div>



                <input type="hidden" id="idVaccine">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterVaccine"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateVaccine"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
