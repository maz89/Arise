<div class="modal fade" id="addCoutume" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Coutume </h5>
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
                        <label for="customername-field" class="form-label">Prefecture  </label>
                        <select class="form-control" data-choices data-choices-search-false name="prefecture_id" id="prefecture_id">

                           <option value="0">    </option>

                                    @php

                                        $prefectures = App\Models\Prefecture::allPrefectureActifs();

                                    @endphp



                                    @foreach( $prefectures  as $prefecture )

                                        <option value="{{$prefecture->id}}">{{$prefecture->continent->libelle. ' - '.$prefecture->region->libelle .'-'.$prefecture->countrie->libelle.'-'.$prefecture->libelle }}</option>


                                    @endforeach





                        </select>


                        <span class="text-danger" id="erreurPrefecture">  </span>
                    </div>

                    

                   





                </div>
                <input type="hidden" id="idCoutume">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterCoutume"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateCoutume"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
