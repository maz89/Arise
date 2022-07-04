
<!-- Default Size -->
<div class="modal animated fadeIn" id="addImmunization" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Immunization    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Employee    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="employee_id" id="employee_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $employes = App\Models\Employe::allEmployeeActifs();

                                    @endphp



                                    @foreach( $employes  as $employe )

                                        <option value="{{$employe->id}}">{{$employe->first_name . ' '.$employe->last_name  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurEmployee_id">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Vaccine    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="vaccine_id" id="vaccine_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $vaccines = App\Models\Vaccine::allVaccineActifs();

                                    @endphp



                                    @foreach( $vaccines  as $vaccine )

                                        <option value="{{$vaccine->id}}">{{$employe->name  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurvaccine_id">  </span>
                        </div>



                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date    <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="date_immunization" name="date_immunization">
                            </div>

                            <span class="text-danger" id="erreurDate">  </span>
                        </div>



                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Is vaccine ?    </label>
                                <select class="form-control form-select"  name="is_vaccine" id="is_vaccine" style="width: 100%; height:36px;">


                                    <option value="0">   No </option>
                                    <option value="0">   Yes </option>



                                </select>
                            </div>


                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Reason    </label>
                                <input class="form-control" type="text" id="reason" name="reason">
                            </div>


                        </div>



                    </div>




                    <input type="hidden" id="idImmunization">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterImmunization">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateImmunization">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerImmunization">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
