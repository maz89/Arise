<div class="modal fade" id="addAssignment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel"> Add Assignment </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <input type="hidden" id="id-field" />



                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Employee   </label>
                        <select class="form-control" data-choices data-choices-search-false name="employe_id" id="employe_id">

                            @php

                                $employes = \App\Models\Employe::allEmployeeActifs();
                            @endphp

                            @foreach($employes as $employe )

                                <option value="{{$employe->id}}">{{$employe->first_name.' '.$employe->last_name}} </option>

                            @endforeach

                        </select>


                        <span class="text-danger" id="erreurEmployee_id">  </span>
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Position   </label>
                        <select class="form-control" data-choices data-choices-search-false name="position_id" id="position_id">

                            @php

                                $positions = \App\Models\Position::allPositionActifs();
                            @endphp

                            @foreach($positions as $position )

                                <option value="{{$position->id}}">{{$position->job_title}} </option>

                            @endforeach



                        </select>


                        <span class="text-danger" id="erreurposition_id">  </span>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Date start  </label>
                        <input type="date" id="date_start" name="date_start" class="form-control" placeholder="Date  start  "   />
                        <span class="text-danger" id="erreurDate_start">  </span>


                    </div>

                    <div class="mb-3">

                        <label for="phone-field" class="form-label">Date  end  </label>
                        <input type="date" id="date_end" name="date_end" class="form-control" placeholder="Date  end  " required />
                        <span class="text-danger" id="erreurDate_end">  </span>

                    </div>




                </div>
                <input type="hidden" id="idAssignment">
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterAssignment"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateAssignment"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
