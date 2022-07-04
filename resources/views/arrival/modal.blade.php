
<!-- Default Size -->
<div class="modal animated fadeIn" id="addArrival" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Arrival    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Traveler <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="traveler_id" id="traveler_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $travelers = App\Models\Traveler::allTravelerActifs();

                                    @endphp



                                    @foreach( $travelers  as $traveler )

                                        <option value="{{$traveler->id}}">{{$traveler->firstname .' '.$traveler->lastname  }}</option>


                                    @endforeach



                                </select>


                            </div>

                            <span class="text-danger" id="erreurTraveler_id">  </span>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Flight <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="flight" name="flight">
                            </div>

                            <span class="text-danger" id="erreurFlight">  </span>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Border <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="border" name="border">
                            </div>

                            <span class="text-danger" id="erreurBorder">  </span>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="date_arrival" name="date_arrival">
                            </div>

                            <span class="text-danger" id="erreurDate_arrival">  </span>
                        </div>
                    </div>




                    <input type="hidden" id="idArrival">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterArrival">Save </button>

                        <button class="btn btn-primary submit-btn" type="button" id="updateArrival">Edit</button>


                        <button class="btn btn-danger submit-btn" type="button" id="annulerArrival">Cancel  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
