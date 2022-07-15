<div class="modal fade" id="addImmunization" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Immunization </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />





                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Immunizatione   </label>
                        <select class="form-control form-select"  name="employee_id" id="employee_id" style="width: 100%; height:36px;">


                            <option value="0">    </option>

                            @php

                                $employes = App\Models\Employe::allEmployeeActifs();

                            @endphp



                            @foreach( $employes  as $employe )

                                <option value="{{$employe->id}}">{{$employe->first_name . ' '.$employe->last_name  }}</option>


                            @endforeach




                        </select>

                          <span class="text-danger" id="erreurEmployee_id">  </span>


                    </div>


                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Vaccine   </label>
                       <select class="form-control form-select"  name="vaccine_id" id="vaccine_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $vaccines = App\Models\Vaccine::allVaccineActifs();

                                    @endphp



                                    @foreach( $vaccines  as $vaccine )

                                        <option value="{{$vaccine->id}}">{{$vaccine->name  }}</option>


                                    @endforeach



                                </select>

                          <span class="text-danger" id="erreurvaccine_id">  </span>


                    </div>




 <div class="mb-3">
                        <label for="phone-field" class="form-label">Date    </label>
                        <input type="date" id="date_immunization" name="date_immunization" class="form-control" placeholder="Birth date  "  />

                          <span class="text-danger" id="erreurDate">  </span>


                    </div>


                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Is vaccine ?     </label>
                       <select class="form-control form-select"  name="is_vaccine" id="is_vaccine" style="width: 100%; height:36px;">


                                    <option value="0">   No </option>
                                    <option value="0">   Yes </option>



                                </select>

                    </div>


                     <div class="mb-3">
                        <label for="phone-field" class="form-label">Reason    </label>
                       <input type="text" id="reason" name="reason" class="form-control" placeholder="Reason   "  />



                    </div>







                </div>
                <input type="hidden" id="idImmunization">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterImmunization"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateImmunization"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
