<div class="modal fade" id="addTraveler" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Traveler </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />





 <div class="mb-3">
                        <label for="phone-field" class="form-label">First name   </label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Firstname    "  />

                          <span class="text-danger" id="erreurFirstname">  </span>


                    </div>


                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Last  name   </label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Lastname    "  />

                          <span class="text-danger" id="erreurLastname">  </span>


                    </div>




                      <div class="mb-3">
                        <label for="phone-field" class="form-label">Countrie  </label>
                       <select class="form-control form-select"  name="countrie_id" id="countrie_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $countries = App\Models\Countrie::allCountrieActifs();

                                    @endphp



                                    @foreach( $countries  as $countrie )

                                        <option value="{{$countrie->id}}">{{$countrie->libelle  }}</option>


                                    @endforeach



                                </select>

                       <span class="text-danger" id="erreurCountrie">  </span>

                    </div>


                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Business  </label>
                       <select class="form-control form-select"  name="business_id" id="business_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $buninesses = App\Models\Business::allBusinessActifs();

                                    @endphp



                                    @foreach( $buninesses  as $buninesse )

                                        <option value="{{$buninesse->id}}">{{$buninesse->title  }}</option>


                                    @endforeach



                                </select>



                    <d


                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Nature  </label>
                        <select class="form-control form-select"  name="nature_id" id="nature_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $natures = App\Models\Nature::allNatureActifs();

                                    @endphp



                                    @foreach( $natures  as $nature )

                                        <option value="{{$nature->id}}">{{$nature->libelle  }}</option>


                                    @endforeach



                                </select>


                    </div>



                   <div class="mb-3">
                        <label for="phone-field" class="form-label">Trip purpose    </label>
                        <input type="text" id="trip_purpose" name="trip_purpose" class="form-control" placeholder="Trip purpose     "  />



                    </div>



                </div>
                <input type="hidden" id="idTraveler">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterTraveler"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateTraveler"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
