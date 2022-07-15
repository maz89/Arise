<div class="modal fade" id="addPrefecture" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Prefecture </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />


                  
                 
                    
 <div class="mb-3">
                        <label for="phone-field" class="form-label">Libelle   </label>
                        <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Libelle    "  />

                          <span class="text-danger" id="erreurLibelle">  </span>
                      

                    </div>

                      <div class="mb-3">
                        <label for="phone-field" class="form-label">Countrie  </label>
                       <select class="form-control form-select"  name="countrie_id" id="countrie_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $countries = App\Models\Countrie::allCountrieActifs();

                                    @endphp



                                    @foreach( $countries  as $countrie )

                                        <option value="{{$countrie->id}}">{{$countrie->continent->libelle. ' - '.$countrie->region->libelle .'-'.$countrie->libelle }}</option>


                                    @endforeach



                                </select>

                         
                       <span class="text-danger" id="erreurCountrie">  </span>

                    </div>



                   

                 

                </div>
                <input type="hidden" id="idPrefecture">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterPrefecture"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updatePrefecture"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
