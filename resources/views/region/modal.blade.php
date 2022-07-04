
<!-- Default Size -->
<div class="modal animated fadeIn" id="addRegion" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Region    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Libelle <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="libelle" name="libelle">
                            </div>

                             <span class="text-danger" id="erreurLibelle">  </span>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Continent  <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="continent_id" id="continent_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $continents = App\Models\Continent::allContinentActifs();

                                    @endphp



                                    @foreach( $continents  as $continent )

                                        <option value="{{$continent->id}}">{{$continent->libelle }}</option>


                                    @endforeach

                                </select>
                            </div>

                            <span class="text-danger" id="erreurContinent">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idRegion">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterRegion">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateRegion">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerRegion">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
