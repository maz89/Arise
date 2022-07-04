
<!-- Default Size -->
<div class="modal animated fadeIn" id="addContract" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Contract    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Employee    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="employe_id" id="employe_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $employes = App\Models\Employe::allEmployeeActifs();

                                    @endphp



                                    @foreach( $employes  as $employe )

                                        <option value="{{$employe->id}}">{{$employe->first_name . ' '.$employe->last_name  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurEmploye">  </span>
                        </div>



                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date start   <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="date_start" name="date_start">
                            </div>

                            <span class="text-danger" id="erreurDate_start">  </span>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date end     <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="date_end" name="date_end">
                            </div>

                            <span class="text-danger" id="erreurDate_end">  </span>
                        </div>






                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Contract type     <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="contract_type_id" id="contract_type_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $types = App\Models\ContractType::allContractTypeActifs();

                                    @endphp



                                    @foreach( $types  as $type )

                                        <option value="{{$type->id}}">{{$type->name  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurcontract_type_id">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date start probation    </label>
                                <input class="form-control" type="date" id="date_start_probation" name="date_start_probation">
                            </div>


                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date end  probation    </label>
                                <input class="form-control" type="date" id="date_end_probation" name="date_end_probation">
                            </div>


                        </div>



                    </div>




                    <input type="hidden" id="idContract">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterContract">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateContract">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerContract">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
