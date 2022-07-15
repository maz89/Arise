<div class="modal fade" id="addCountrie" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Countrie </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />


                    <div class="mb-3">
                        <label for="email-field" class="form-label">Libelle </label>
                        <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Libelle "   />
                        <span class="text-danger" id="erreurLibelle">  </span>

                      

                    </div>


                     <div class="mb-3">
                        <label for="email-field" class="form-label">Nationality </label>
                        <input type="text" id="nationality" name="nationality" class="form-control" placeholder="Nationality"   />
                       

                    </div>



                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Région  </label>
                        <select class="form-control" data-choices data-choices-search-false name="region_id" id="region_id">

                            @php

                                        $regions = App\Models\Region::allRegionActifs();

                                    @endphp



                                    @foreach( $regions  as $region )

                                        <option value="{{$region->id}}">{{$region->continent->libelle. ' - '.$region->libelle  }}</option>


                                    @endforeach


                        </select>


                        <span class="text-danger" id="erreurRegion">  </span>
                    </div>

                    

                   





                </div>
                <input type="hidden" id="idCountrie">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterCountrie"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateCountrie"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
