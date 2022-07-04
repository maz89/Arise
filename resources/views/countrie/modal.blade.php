
<!-- Default Size -->
<div class="modal animated fadeIn" id="addCountrie" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Countrie    </h3>
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
                                <label>Nationality  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nationality" name="nationality">
                            </div>


                        </div>




                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Région   <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="region_id" id="region_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $regions = App\Models\Region::allRegionActifs();

                                    @endphp



                                    @foreach( $regions  as $region )

                                        <option value="{{$region->id}}">{{$region->continent->libelle. ' - '.$region->libelle  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurRegion">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idCountrie">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterCountrie">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateCountrie">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerCountrie">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
