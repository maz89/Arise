
<!-- Default Size -->
<div class="modal animated fadeIn" id="addEmploye" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title" id="myModalLabel">Add   employe    </h3>
            </div>
            <div class="modal-body">


                <form>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Matricule <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="matricule" name="matricule">
                            </div>

                             <span class="text-danger" id="erreurMatricule">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>First name   <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="first_name" name="first_name">
                            </div>


                            <span class="text-danger" id="erreurfirst_name">  </span>

                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Last name   <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="last_name" name="last_name">
                            </div>

                            <span class="text-danger" id="erreurlast_name">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Usual name   </label>
                                <input class="form-control" type="text" id="usual_name" name="usual_name">
                            </div>


                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Birth date    </label>
                                <input class="form-control" type="date" id="birth_date" name="birth_date">
                            </div>


                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Birth date   correct   <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="birth_date_correct" name="birth_date_correct">
                            </div>

                            <span class="text-danger" id="erreurBirth_date">  </span>
                        </div>




                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Department   <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="departement_id" id="departement_id" style="width: 100%; height:36px;">


                                    <option value="0">    </option>

                                    @php

                                        $departements = App\Models\Departement::allDepartementActifs();

                                    @endphp



                                    @foreach( $departements  as $departement )

                                        <option value="{{$departement->id}}">{{$departement->title  }}</option>


                                    @endforeach



                                </select>


                            </div>

                            <span class="text-danger" id="erreurdepartement_id">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Type    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="type" id="type" style="width: 100%; height:36px;">
                                    <option value="0">    </option>

                                    <option value="{{\App\Types\TypeEmploye::NATIONAL}}"> National    </option>
                                    <option value="{{\App\Types\TypeEmploye::EXPATRIE}}"> Expatrié     </option>





                                </select>
                            </div>

                            <span class="text-danger" id="erreurtype">  </span>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Gender    <span class="text-danger">*</span></label>
                                <select class="form-control form-select"  name="gender" id="gender" style="width: 100%; height:36px;">
                                    <option value="0">    </option>

                                    <option value="{{\App\Types\Gender::MASCULIN}}"> Masculin     </option>
                                    <option value="{{\App\Types\Gender::FEMININ}}"> Féminin      </option>


                                </select>
                            </div>

                            <span class="text-danger" id="erreurgender">  </span>
                        </div>


                    </div>

                    <br>
                    <br>


                    <div class="row">
                       <div class="col-sm-12">
                           <div class="card-box">

                               <ul class="nav nav-tabs nav-tabs-top nav-justified">
                                   <li class="nav-item"><a class="nav-link active" href="#top-justified-tab1" data-toggle="tab">Personal Data </a></li>
                                   <li class="nav-item"><a class="nav-link" href="#top-justified-tab2" data-toggle="tab">Professional data </a></li>
                                   <li class="nav-item"><a class="nav-link" href="#top-justified-tab3" data-toggle="tab">Contract & Assignment </a></li>
                                   <li class="nav-item"><a class="nav-link" href="#top-justified-tab4" data-toggle="tab">Families   </a></li>
                                   <li class="nav-item"><a class="nav-link" href="#top-justified-tab5" data-toggle="tab">Bank infos  </a></li>
                               </ul>
                               <div class="tab-content">
                                   <div class="tab-pane show active" id="top-justified-tab1">
                                       <div class="row">
                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Phone perso  </label>
                                                   <input class="form-control" type="text" id="phone_perso" name="phone_perso">
                                               </div>


                                           </div>

                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Phone pro  </label>
                                                   <input class="form-control" type="text" id="phone_pro" name="phone_pro">
                                               </div>


                                           </div>


                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Email perso  </label>
                                                   <input class="form-control" type="text" id="email_perso" name="email_perso">
                                               </div>


                                           </div>

                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Email perso   </label>
                                                   <input class="form-control" type="text" id="email_pro" name="email_pro">
                                               </div>


                                           </div>


                                           <div class="col-sm-8">
                                               <div class="form-group">
                                                   <label>Address    <span class="text-danger">*</span></label>
                                                   <input class="form-control" type="text" id="address" name="address">
                                               </div>


                                           </div>




                                       </div>
                                   </div>
                                   <div class="tab-pane" id="top-justified-tab2">

                                       <div class="row">
                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Numero  CNSS   </label>
                                                   <input class="form-control" type="text" id="num_cnss" name="num_cnss">
                                               </div>


                                           </div>

                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Policy numero    </label>
                                                   <input class="form-control" type="text" id="num_policy" name="num_policy">
                                               </div>


                                           </div>


                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Band    </label>
                                                   <select class="form-control form-select"  name="band_id" id="band_id" style="width: 100%; height:36px;">


                                                       <option value="0">    </option>

                                                       @php

                                                           $bands = App\Models\Band::allBandActifs();

                                                       @endphp



                                                       @foreach( $bands  as $band )

                                                           <option value="{{$band->id}}">{{$band->libelle }}</option>


                                                       @endforeach



                                                   </select>
                                               </div>


                                           </div>

                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Countrie  </label>
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


                                           </div>


                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <label>Prefecture    <span class="text-danger">*</span></label>

                                                   <select class="form-control form-select"  name="countrie_id" id="countrie_id" style="width: 100%; height:36px;">


                                                       <option value="0">    </option>

                                                       @php

                                                           $prefectures = App\Models\Prefecture::allPrefectureActifs();

                                                       @endphp



                                                       @foreach( $prefectures  as $prefecture )

                                                           <option value="{{$prefecture->id}}">{{$prefecture->libelle }}</option>


                                                       @endforeach



                                                   </select>


                                               </div>


                                           </div>




                                       </div>

                                   </div>
                                   <div class="tab-pane" id="top-justified-tab3">

                                   </div>


                                   <div class="tab-pane" id="top-justified-tab4">

                                   </div>


                                   <div class="tab-pane" id="top-justified-tab5">

                                   </div>




                               </div>
                           </div>

                       </div>


                    </div>




                    <input type="hidden" id="idEmploye">

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="button" id="ajouterEmploye">Enrégistrer </button>

                         <button class="btn btn-primary submit-btn" type="button" id="updateEmploye">Modifier </button>


                         <button class="btn btn-danger submit-btn" type="button" id="annulerEmploye">Annuler  </button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
