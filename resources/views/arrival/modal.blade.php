<div class="modal fade" id="addArrival" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Arrival </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />



                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Traveler  </label>
                        <select class="form-control" data-choices data-choices-search-false name="traveler_id" id="traveler_id">

                            @php

                                $travelers = \App\Models\Traveler::allTravelerActifs();
                            @endphp

                            @foreach($travelers as $traveler )

                            <option value="{{$traveler->id}}">{{$traveler->firstname.' '.$traveler->lastname}} </option>

                            @endforeach

                        </select>


                        <span class="text-danger" id="erreurTraveller">  </span>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Date arrival </label>
                        <input type="date" id="date_arrival" name="date_arrival" class="form-control" placeholder="Date  Arrival "   />
                        <span class="text-danger" id="erreurDate">  </span>

                        <div class="invalid-feedback">
                            Please write a value.
                        </div>


                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Time arrival </label>
                        <input type="text" id="time_arrival" name="time_arrival" class="form-control" placeholder="Time Arrival " required />
                        <span class="text-danger" id="erreurTime">  </span>

                    </div>


                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Flight  </label>
                        <input type="text" id="flight" name="flight" class="form-control" placeholder="Flight Arrival " required />
                        <span class="text-danger" id="erreurFlight">  </span>

                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Border   </label>
                        <input type="text" id="border" name="border" class="form-control" placeholder="Border Arrival " required />
                        <span class="text-danger" id="erreurBorder">  </span>

                    </div>






                </div>
                <input type="hidden" id="idArrival">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterArrival"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateArrival"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
