<!-- Modal -->
<div class="modal fade zoomIn" id="addEmploye" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerLabel">Add Employe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" >
            <div class="modal-content border-0 mt-3">
                <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                           Personal Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab" aria-selected="false">
                           Professional data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab" aria-selected="false">
                           Contract & Assignment
                        </a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#families" role="tab" aria-selected="false">
                          Families
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#bank" role="tab" aria-selected="false">
                         Bank infos
                        </a>
                    </li>




                </ul>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                       <label>Matricule <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="matricule" name="matricule" placeholder="Enter your matricule ">

                                        <span class="text-danger" id="erreurMatricule">  </span>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                <div class="mb-3">
                                    <label>Gender <span class="text-danger">*</span></label>
                                    <select class="form-control form-select"  name="gender" id="gender" style="width: 100%; height:36px;">
                                        <option value="0">    </option>

                                        <option value="{{\App\Types\Gender::MASCULIN}}"> Masculin     </option>
                                        <option value="{{\App\Types\Gender::FEMININ}}"> Féminin      </option>




                                    </select>


                                    <span class="text-danger" id="erreurgender">  </span>


                                </div>

                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your firstname ">
                                        <span class="text-danger" id="erreurfirst_name">  </span>


                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name  ">
                                        <span class="text-danger" id="erreurfirst_name">  </span>


                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Usual name</label>
                                        <input type="text" class="form-control" id="usual_name" name="usual_name" placeholder="Enter your usual name   ">


                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Birth date</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Enter your birth date   ">


                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Birth date   correct </label>
                                        <input type="date" class="form-control" id="birth_date_correct" name="birth_date_correct" placeholder="Enter your birth date correct    ">
                                        <span class="text-danger" id="erreurBirth_date">  </span>

                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Department</label>
                                        <select class="form-control form-select"  name="departement_id" id="departement_id" style="width: 100%; height:36px;">


                                            <option value="0">    </option>

                                            @php

                                                $departements = App\Models\Departement::allDepartementActifs();

                                            @endphp



                                            @foreach( $departements  as $departement )

                                                <option value="{{$departement->id}}">{{$departement->title  }}</option>


                                            @endforeach


                                        </select>

                                        <span class="text-danger" id="erreurdepartement_id">  </span>

                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailidInput" class="form-label">Type</label>
                                        <select class="form-control form-select"  name="type" id="type" style="width: 100%; height:36px;">
                                            <option value="0">    </option>

                                            <option value="{{\App\Types\TypeEmploye::NATIONAL}}"> National    </option>
                                            <option value="{{\App\Types\TypeEmploye::EXPATRIE}}"> Expatrié     </option>





                                        </select>


                                        <span class="text-danger" id="erreurtype">  </span>

                                    </div>
                                </div>


                    </div>
                    </div>
                    <div class="tab-pane" id="businessDetails" role="tabpanel">

                    </div>
                    <div class="tab-pane" id="bankDetails" role="tabpanel">

                    </div>

                    <div class="tab-pane" id="families" role="tabpanel">

                    </div>

                    <div class="tab-pane" id="bank" role="tabpanel">

                    </div>
                </div>
            </div>

                <hr>
                <input type="hidden" id="idEmploye">

                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterEmploye"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateEmploye"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>

    </div>
</div>
<!--end modal-->
</div>
