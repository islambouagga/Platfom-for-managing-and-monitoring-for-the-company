<!--suppress ALL -->
<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase ">
                    <h2 class="card-title" style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Intervenants</h2>
                    <a href="#" class="d-block"> </a>
                    <div class="card-tools">
                        <button class="btn btn-success" @click="newModal()" v-if="$gate.isAgentTC()" >
                            <i class="fa fa-user-plus fa-fw"></i></button>
                    </div>
                </div>

                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher par Nom, Prenom, Numero de Telephone ou Emails:</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped" id="#myInput">
                            <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr></thead>
                            <tbody id="myTable">
                            <tr v-for="intervenant in intervenants" :key="intervenant.id"  >
                                <th scope="row">{{intervenant.id}}</th>
<!--                                <td v-for="intervenant.users "></td>-->
                                <td>{{intervenant.users[0].nomUtilis | upText }}</td>
                                <td>{{intervenant.users[0].prenomUtilis | upText }}</td>
                                <td>{{intervenant.users[0].tel }}</td>
                                <td>{{intervenant.users[0].email }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" href="#" @click="showModal(intervenant,intervenant.users[0])"
                                                v-if="$gate.isAgentTC() || $gate.isDirecteur() || $gate.isChargePrj() ">
                                            <i class="fa fa-file-alt "></i> </button>&nbsp;

                                        <button class="btn btn-primary" href="#" @click="editModal(intervenant,intervenant.users[0])"
                                        v-if="$gate.isAgentTC()">
                                            <i class="fa fa-edit "></i> </button>&nbsp;

                                        <button class="btn btn-danger" href="#" @click="deleteIntervenant(intervenant.id)"
                                                v-if="$gate.isAgentTC()">
                                            <i class="fa fa-trash-alt "></i>  </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.table____________________________________________________- -->
            </div>
        </div>


        <!-- Modal add-->
        <div class="modal fade" id="addNewInterv" tabindex="-1" aria-labelledby="addNewIntervLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent="ajoutIntervenant" >
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                            <div class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 font-weight-bold" id="addNewIntervLabel"><strong>Ajouter</strong>
                                    <a class="text-test font-weight-bold"> <strong >Intervenant </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">

                                <div class="row">
                                    <div class="col ">
                                    <label data-error="wrong" data-success="right"   >Nom</label>
                                    <input v-model="intervenant.nomUtilis" placeholder="Nom de l'intervenant" type="text" id="nomUtilis" name="nomUtilis"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('nomUtilis')" v-html="intervenant.errors.get('nomUtilis')" />
                                </div>
                                        <div class="col ">
                                    <label data-error="wrong" data-success="right"   >Prénom</label>
                                    <input v-model="intervenant.prenomUtilis" placeholder="Prénom de l'intervenant" type="text" id="prenomUtilis" name="prenomUtilis"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('prenomUtilis')" v-html="intervenant.errors.get('prenomUtilis')" />
                                </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Date de naissance</label>
                                        <input v-model="intervenant.dateNUtilis" placeholder="01/01/1990" type="date" id="dateNUtilis" name="dateNUtilis"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="intervenant.errors.has('dateNUtilis')" v-html="intervenant.errors.get('dateNUtilis')" />
                                    </div>

                                    </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">
                                <div class="row">
                                <div class="col-mb-4">
                                    <div class="col">
                                    <label data-error="wrong" data-success="right">E-mail</label>
                                    <input v-model="intervenant.email" placeholder="ex:Email@Gmail.com" type="email" id="email" name="email"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('email')" v-html="intervenant.errors.get('email')" />
                                    </div><br>

                                <div class="col">
                                    <label data-error="wrong" data-success="right"   >Numéro de téléphone</label>
                                    <input v-model="intervenant.tel" placeholder="Mobile de l'intervenant" type="number" id="tel" name="tel"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('tel')" v-html="intervenant.errors.get('tel')" />
                                </div>
                                </div>

                                <div class="col">
                                    <label data-error="wrong" data-success="right"   >Adresse</label>
                                    <textarea v-model="intervenant.adressUtilis"placeholder="Adresse de l'intervenant" type="text" id="adressUtilis" name="adressUtilis"  class="form-control validate white-text"></textarea>
                                    <div style="color:red;" v-if="intervenant.errors.has('adressUtilis')" v-html="intervenant.errors.get('adressUtilis')" />
                                </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">
                                <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right">Poste</label>

                                    <select v-model="intervenant.poste" placeholder="Poste" type="text" id="poste" name="poste"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('poste')" v-html="intervenant.errors.get('poste')" />
                                        <option disabled value="">Selectionner poste</option>
                                        <option value="Agent d'administration">Agent d'administration</option>
                                        <option value="Technicien de laboratoire">Technicien de laboratoire</option>
                                        <option value="Technicien en genie civil">Technicien en genie civil</option>
                                        <option value="Ingenieur en genie civil">Ingenieur en genie civil</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label data-error="wrong" data-success="right">Mot de passe</label>
                                    <input v-model="intervenant.password" placeholder="Mot de passe" type="password" id="password" name="password"  class="form-control validate white-text">
                                    <div style="color:red;" v-if="intervenant.errors.has('password')" v-html="intervenant.errors.get('password')" />
                               </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Information-->
        <div class="modal fade" id="infoInterv" tabindex="-1" aria-labelledby="infoIntervLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent="infoInterv" >
                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="myModalLabel"><strong>Details de </strong>
                                <a class="text-test font-weight-bold"> <strong >l'Intervenant </strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body ">
                            <br>
                            <div class="row">
                                <div class="col ">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nom :</label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{intervenant.nomUtilis | upText}} </label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Prénom :  </label>
                                    <label data-error="wrong" data-success="right" class="text-green "> {{intervenant.prenomUtilis | upText}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date de naissance : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{intervenant.dateNUtilis | upText}} </label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Mobile : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{intervenant.tel}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Email :</label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{intervenant.email  | upText}}</label>
                                        <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase"> Adress : </label>
                                    <label data-error="wrong" data-success="right" class="text-green "> {{intervenant.adressUtilis  | upText}} </label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right"class="text-uppercase"> Poste : </label>
                                    <label data-error="wrong" data-success="right" class="text-green "> {{intervenant.poste}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger " data-dismiss="modal">Fermer</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal edit-->
        <div class="modal fade" id="editInterv" tabindex="-1" aria-labelledby="editIntervLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent="updatIntervenant()" >
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                            <div class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold" id="addNewIntervLabel"><strong>Modifier</strong>
                                    <a class="text-test font-weight-bold"> <strong >Intervenant </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">
                                <div class="row">
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right"   >Nom</label>
                                        <input v-model="user.nomUtilis"  type="text" id="nomUtilis" name="nomUtilis"  class="form-control validate white-text">
                                        <div v-if="user.errors.has('nomUtilis')" v-html="user.errors.get('nomUtilis')" />
                                    </div>
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right"   >Prénom</label>
                                        <input v-model="user.prenomUtilis" type="text" id="prenomUtilis" name="prenomUtilis"  class="form-control validate white-text">
                                        <div v-if="user.errors.has('prenomUtilis')" v-html="user.errors.get('prenomUtilis')" />
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Date de naissance</label>
                                        <input v-model="user.dateNUtilis" type="date" id="dateNUtilis" name="dateNUtilis"  class="form-control validate white-text">
                                        <div v-if="user.errors.has('dateNUtilis')" v-html="user.errors.get('dateNUtilis')" />
                                    </div>

                                </div><br>

                                <div class="row">
                                    <div class="col-mb-4">
                                        <div class="col">
                                            <label data-error="wrong" data-success="right"   >Email</label>
                                            <input v-model="user.email" type="email" id="email" name="email"  class="form-control validate white-text">
                                            <div v-if="user.errors.has('email')" v-html="user.errors.get('email')" />
                                        </div><br>

                                        <div class="col">
                                            <label data-error="wrong" data-success="right"   >Numéro de téléphone</label>
                                            <input v-model="user.tel" type="number" id="tel" name="tel"  class="form-control validate white-text">
                                            <div v-if="user.errors.has('tel')" v-html="user.errors.get('tel')" />
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Adress</label>
                                        <textarea v-model="user.adressUtilis" type="text" id="adressUtilis" name="adressUtilis"  class="form-control validate white-text"></textarea>
                                        <div v-if="user.errors.has('adressUtilis')" v-html="user.errors.get('adressUtilis')" />
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Poste</label>

                                        <select v-model="intervenant.poste" placeholder="Poste" type="text" id="poste" name="poste"  class="form-control validate white-text">
                                            <div style="color:red;" v-if="intervenant.errors.has('poste')" v-html="intervenant.errors.get('poste')" />
                                            <option value="Agent d'administration">Agent d'administration</option>
                                            <option value="Technicien de laboratoire">Technicien de laboratoire</option>
                                            <option value="Technicien en genie civil">Technicien en genie civil</option>
                                            <option value="Ingenieur en genie civil">Ingenieur en genie civil</option>
                                        </select>
                                    </div>


                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform";
export default {
    data() {
        return {
            tedtdt: false,
            intervenants :{},
            intervenant: new Form({
                id:'',
                nomUtilis: '',
                prenomUtilis: '',
                email: '',
                adressUtilis: '',
                tel: '',
                usertable_type: 'Intervenant',
                dateNUtilis: '',
                poste: '',
                 password: '',
            }),
            user: new Form({
                id:'',
                nomUtilis: '',
                prenomUtilis: '',
                email: '',
                adressUtilis: '',
                tel: '',
                usertable_type: 'Intervenant',
                dateNUtilis: '',
                password: '',
            })
        }
    },
    methods: {
        newModal() {
            if(this.$gate.isAgentTC()) {
                this.tedtdt = false;
                this.intervenant.reset();
                $('#addNewInterv').modal('show')
            }},

        editModal(intervenant,users) {
            if(this.$gate.isAgentTC()){
            this.tedtdt = true;
            this.intervenant.reset();
            $('#editInterv').modal('show')
            // console.log(intervenant)
            // console.log(users)
            this.user.fill(users);
            this.intervenant.fill(intervenant);
            this.intervenant.nomUtilis = this.user.nomUtilis
            this.intervenant.prenomUtilis =this.user.prenomUtilis
            this.intervenant.email =this.user.email
            this.intervenant.adressUtilis = this.user.adressUtilis
            this.intervenant.tel = this.user.tel
            this.intervenant.dateNUtilis =    this.user.dateNUtilis
            this.intervenant.password =    this.user.password
            this.intervenant.usertable_type =    this.user.usertable_type
        }},

        showModal(intervenant,users){
            if(this.$gate.isAgentTC() || this.$gate.isChargePrj() || this.$gate.isDirecteur()){

            $('#infoInterv').modal('show')
            console.log(intervenant)
            console.log(users)
            this.user.fill(users);
            this.intervenant.fill(intervenant);
            this.intervenant.nomUtilis = this.user.nomUtilis
            this.intervenant.prenomUtilis =this.user.prenomUtilis
            this.intervenant.email =this.user.email
            this.intervenant.adressUtilis = this.user.adressUtilis
            this.intervenant.tel = this.user.tel
            this.intervenant.dateNUtilis =    this.user.dateNUtilis
            this.intervenant.password =    this.user.password
            this.intervenant.usertable_type =    this.user.usertable_type
        }},

        loadIntervenant () {
            if(this.$gate.isAgentTC() || this.$gate.isChargePrj() || this.$gate.isDirecteur()){
            axios.get("api/intervenant").then(({ data }) => (this.intervenants = data));
        }},

        ajoutIntervenant () {
            if(this.$gate.isAgentTC()){
            this.$Progress.start();
            this.intervenant.post('/api/intervenant')
            .then(() => {
                Fire.$emit('apresAjout');
                $('#addNewInterv').modal('hide');
                this.intervenant.reset();
                Toast.fire({
                    icon: 'success',
                    title: 'Intervenant bien enregistré'
                })
                this.$Progress.finish();

            })
            .catch(()=>{
                Toast.fire({
                    icon: 'error',
                    title: 'Veuillez remplir les champs correctement'
                })
                this.$Progress.fail()
            })

        }},

        updatIntervenant(){
            if(this.$gate.isAgentTC()){
            this.$Progress.start();
            console.log(this.intervenant.id)
            this.intervenant.nomUtilis = this.user.nomUtilis
            this.intervenant.prenomUtilis =this.user.prenomUtilis
            this.intervenant.email =this.user.email
            this.intervenant.adressUtilis = this.user.adressUtilis
            this.intervenant.tel = this.user.tel
            this.intervenant.dateNUtilis =    this.user.dateNUtilis
            this.intervenant.password =    this.user.password
            this.intervenant.usertable_type =    this.user.usertable_type
            this.intervenant.put('api/intervenant/' + this.intervenant.id)
                .then(() => {
                    Fire.$emit('apresAjout');
                    $('#editInterv').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Intervenant bien modifié'
                    });
                    this.$Progress.finish();

                })
                .catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Something went wrong!'
                    });
                    this.$Progress.fail();
                })
        }},

        deleteIntervenant(id){
            if(this.$gate.isAgentTC()){
            Swal.fire({
                title: 'Vous ête sur?',
                text: "Vous ne pouvez plus revvenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimer le!'
            }).then((result) => {
                if (result.value) {
                    this.intervenant.delete('api/intervenant/' + id)
                        .then((res) => {

                            Swal.fire(
                                'bien suprimé!',
                                'client bien suprimé.',
                                'success'
                            )
                            Fire.$emit('apresAjout');
                        })
                        .catch(() => {
                            Swal.fire(
                                'Failed!',
                                'Intervenant non suprimé!!',
                                'warning'
                            )
                        })
                }
            })

        }},
    },
    created() {
        if(this.$gate.isAgentTC() || this.$gate.isChargePrj() || this.$gate.isDirecteur()){        this.loadIntervenant();

        Fire.$on('apresAjout',() => {
            this.loadIntervenant();
            // this.refresh();
        });


        // setInterval(() => this.loadIntervenant(), 3000);
    }}
}

</script>

