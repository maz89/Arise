
<!-- Default Size -->
<div class="modal animated fadeIn" id="addTraveler" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Traveler    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Fisrt name    <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="firstname" name="firstname">
                            </div>

                            <span class="text-danger" id="erreurFirstname">  </span>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Last  name     <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="lastname" name="lastname">
                            </div>

                            <span class="text-danger" id="erreurLastname">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Countrie    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="countrie_id" id="countrie_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $countries = App\Models\Countrie::allCountrieActifs();

                                    @endphp



                                    @foreach( $countries  as $countrie )

                                        <option value="{{$countrie->id}}">{{$countrie->libelle  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurCountrie">  </span>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Business   </label>
                                <select class="form-control form-select"  name="business_id" id="business_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $buninesses = App\Models\Business::allBusinessActifs();

                                    @endphp



                                    @foreach( $buninesses  as $buninesse )

                                        <option value="{{$buninesse->id}}">{{$buninesse->title  }}</option>


                                    @endforeach



                                </select>
                            </div>


                        </div>







                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nature      <span class="text-danger">*</span></label>
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

                            <span class="text-danger" id="erreurNature">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Trip purpose    </label>
                                <input class="form-control" type="text" id="trip_purpose" name="trip_purpose">
                            </div>


                        </div>





                    </div>




                    <input type="hidden" id="idTraveler">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterTraveler">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateTraveler">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerTraveler">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
