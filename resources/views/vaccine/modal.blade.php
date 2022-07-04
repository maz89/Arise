
<!-- Default Size -->
<div class="modal animated fadeIn" id="addVaccine" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Vaccine    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>

                             <span class="text-danger" id="erreurName">  </span>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nb doses   <span class="text-danger">*</span></label>
                                <input class="form-control" type="integer" id="nb_doses" name="nb_doses">
                            </div>

                            <span class="text-danger" id="erreurName">  </span>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Disease    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="disease_id" id="disease_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $diseases = App\Models\Disease::allDiseaseActifs();

                                    @endphp



                                    @foreach( $diseases  as $disease )

                                        <option value="{{$disease->id}}">{{$disease->libelle }}</option>


                                    @endforeach

                                </select>
                            </div>

                            <span class="text-danger" id="erreurdisease_id">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idVaccine">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterVaccine">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateVaccine">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerVaccine">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
