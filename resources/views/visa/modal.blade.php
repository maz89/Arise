
<!-- Default Size -->
<div class="modal animated fadeIn" id="addVisa" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add  visa    </h3>
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

                            <span class="text-danger" id="erreurTraveler">  </span>
                        </div>
                        <div class="col-sm-12">

                            <div class="form-group">
                                <label>Validity <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="validity" name="validity">
                            </div>

                            <span class="text-danger" id="erreurValidity">  </span>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Expery <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="expery" name="expery">
                            </div>

                            <span class="text-danger" id="erreurExpery">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idVisa">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterVisa">Save </button>

                        <button class="btn btn-primary submit-btn" type="button" id="updateVisa">Edit </button>


                        <button class="btn btn-danger submit-btn" type="button" id="annulerVisa">Cancel</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
