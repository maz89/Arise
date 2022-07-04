
<!-- Default Size -->
<div class="modal animated fadeIn" id="addCoutume" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Coutume    </h3>
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
                                <label>Prefecture   <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="prefecture_id" id="prefecture_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $prefectures = App\Models\Prefecture::allPrefectureActifs();

                                    @endphp



                                    @foreach( $prefectures  as $prefecture )

                                        <option value="{{$prefecture->id}}">{{$prefecture->continent->libelle. ' - '.$prefecture->region->libelle .'-'.$prefecture->countrie->libelle.'-'.$prefecture->libelle }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurPrefecture">  </span>
                        </div>


                    </div>




                    <input type="hidden" id="idCoutume">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterCoutume">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateCoutume">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerCoutume">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
