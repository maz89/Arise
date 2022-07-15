<!-- Modal -->
<div class="modal fade zoomIn" id="addUtilisateur" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerLabel">Add user </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" >
                <div class="modal-content border-0 mt-3">
                    <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                User  Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab" aria-selected="false">
                                User  roles
                            </a>
                        </li>



                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">

                            <div class="row">




                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Nom  </label>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter your name ">
                                        <span class="text-danger" id="erreurNom">  </span>


                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Login   </label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter your login ">
                                        <span class="text-danger" id="erreurLogin">  </span>


                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Password    </label>
                                        <input type="password" class="form-control" id="mot_passe" name="mot_passe" placeholder="Enter your password  ">
                                        <span class="text-danger" id="erreurMotpasse">  </span>


                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Role</label>
                                        <select class="form-control form-select"  name="role" id="role" style="width: 100%; height:36px;">

                                            <option value="0">    </option>

                                            <option value="{{\App\Types\Role::ADMINISTRATEUR}}"> Administrateur     </option>
                                            <option value="{{\App\Types\Role::MANAGER_RH}}"> Manager RH      </option>
                                            <option value="{{\App\Types\Role::ASSISTANT_RH}}"> Assistant  RH      </option>



                                        </select>

                                        <span class="text-danger" id="erreurRole">  </span>

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
                <input type="hidden" id="idUtilisateur">

                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="ajouterUtilisateur"><i class="ri-save-line align-bottom me-1"></i> Save    </button>
                        <button type="button" class="btn btn-success" id="updateUtilisateur"><i class="ri-save-line align-bottom me-1"></i>Update </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--end modal-->
</div>
