
<!-- Default Size -->
<div class="modal animated fadeIn" id="addPrefecture" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Prefecture    </h3>
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
                                <label>Countrie   <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="countrie_id" id="countrie_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $countries = App\Models\Countrie::allCountrieActifs();

                                    @endphp



                                    @foreach( $countries  as $countrie )

                                        <option value="{{$countrie->id}}">{{$countrie->continent->libelle. ' - '.$countrie->region->libelle .'-'.$countrie->libelle }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurCountrie">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idPrefecture">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterPrefecture">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updatePrefecture">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerPrefecture">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
