
<!-- Default Size -->
<div class="modal animated fadeIn" id="addAssignment" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   Assignment    </h3>
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
                                <label>Position    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="position_id" id="position_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $positions = App\Models\Position::allPositionActifs();

                                    @endphp



                                    @foreach( $positions  as $position )

                                        <option value="{{$position->id}}">{{$position->job_title  }}</option>


                                    @endforeach



                                </select>
                            </div>

                            <span class="text-danger" id="erreurposition_id">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Is Manager ?     </label>
                                <select class="form-control form-select"  name="is_manager" id="is_manager" style="width: 100%; height:36px;">


                                    <option value="0"> No    </option>
                                    <option value="1">  Yes  </option>


                                </select>
                            </div>


                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
{{--                                <label>Department     </label>--}}
                                <select class="form-control form-select"  name="department_id" id="department_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $departements = App\Models\Departement::allDepartementActifs();

                                    @endphp



                                    @foreach( $departements  as $departement )

                                        <option value="{{$departement->id}}">{{$departement->title  }}</option>


                                    @endforeach



                                </select>
                            </div>


                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
{{--                                <label>Business      </label>--}}
                                <select class="form-control form-select"  name="business_id" id="business_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $businesses = App\Models\Business::allBusinessActifs();

                                    @endphp



                                    @foreach( $businesses  as  $businesse )

                                        <option value="{{ $businesse->id}}">{{ $businesse->title  }}</option>


                                    @endforeach



                                </select>
                            </div>


                        </div>







                    </div>




                    <input type="hidden" id="idAssignment">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterAssignment">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateAssignment">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerAssignment">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
