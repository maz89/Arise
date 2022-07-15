<!-- Modal -->
<div class="modal fade zoomIn" id="addContract" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerLabel">Add contract</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" >
                <div class="modal-content border-0 mt-3">
                    <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                Contract  Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab" aria-selected="false">
                                Employee data
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
                                        <label>Employee <span class="text-danger">*</span></label>
                                        <select class="form-control form-select"  name="employe_id" id="employe_id" style="width: 100%; height:36px;">
                                            <option value="0">    </option>

                                            @php

                                                $employes = App\Models\Employe::allEmployeeActifs();

                                            @endphp



                                            @foreach( $employes  as $employe )

                                                <option value="{{$employe->id}}">{{$employe->first_name . ' '.$employe->last_name  }}</option>


                                            @endforeach



                                        </select>


                                        <span class="text-danger" id="erreurEmploye">  </span>


                                    </div>

                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Date start </label>
                                        <input type="date" class="form-control" id="date_start" name="date_start" placeholder="Enter your date start ">
                                        <span class="text-danger" id="erreurDate_start">  </span>


                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Date  end </label>
                                        <input type="date" class="form-control" id="date_end" name="date_end" placeholder="Enter your date end  ">
                                        <span class="text-danger" id="erreurDate_end">  </span>


                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Contract type</label>
                                        <select class="form-control form-select"  name="contract_type_id" id="contract_type_id" style="width: 100%; height:36px;">


                                            <option value="0">    </option>

                                            @php

                                                $types = App\Models\ContractType::allContractTypeActifs();

                                            @endphp



                                            @foreach( $types  as $type )

                                                <option value="{{$type->id}}">{{$type->name  }}</option>


                                            @endforeach


                                        </select>

                                        <span class="text-danger" id="erreurcontract_type_id">  </span>

                                    </div>
                                </div>
                                <!--end col-->



                            </div>
                        </div>
                        <div class="tab-pane" id="businessDetails" role="tabpanel">

                        </div>

                    </div>
                </div>

                <hr>
                <input type="hidden" id="idContract">

                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterContract"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateContract"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--end modal-->
</div>
