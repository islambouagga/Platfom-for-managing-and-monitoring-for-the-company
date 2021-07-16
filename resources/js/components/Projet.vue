<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-uppercase"
                        style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Projets </h2>
                    <div class="card-tools">
                        <button class="btn btn-success" @click="newModal()"
                                v-if="$gate.isAgentTC()">
                            <i class="fa fa-plus-circle fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher par Nom, Prenom, Wilaya ou date :</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Wilaya</th>
                                <th scope="col">Date d'ouverture</th>
                                <th scope="col">Date Fin</th>
                                <th scope="col">Details / Archive</th>

                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <tr>
                            <tr v-for="projet in projets" :key="projet.id">
                                <th scope="row">{{ projet.id }}</th>
                                <td>{{ projet.nomPrj }}</td>
                                <td>{{ projet.wilayas }}</td>
                                <td>{{ projet.dateOuverture }}</td>
                                <td>{{ projet.dateFin }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(projet)">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-danger" href="#" @click="deleteProjet(projet.id)"
                                                v-if="$gate.isAgentTC()">
                                            <i class="fa fa-box-open "></i></button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.table____________________________________________________- -->
            </div>
            <!-- /.card -->
        </div>


        <!-- Modal add-->
        <div class="modal fade" id="addNewPrj" tabindex="-1" aria-labelledby="addNewPrjLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image"
                     style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                    <form @submit.prevent="ajoutProjet">
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                            <div class="modal-header text-center pb-4 ">
                                <h3 class="modal-title w-100 text-blue font-weight-bold" id="myModalLabel"><strong>Ajouter</strong>
                                    <a class="text-test text-uppercase font-weight-bold"> <strong>Projet </strong></a>
                                </h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">
                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Nom du projet</label>
                                        <input type="text" id="nomPrj" placeholder="Nom du projet"
                                               v-model="projet.nomPrj" name="nomPrj" class="form-control validate">
                                        <div style="color:red;" v-if="projet.errors.has('nomPrj')"
                                             v-html="projet.errors.get('nomPrj')"/>
                                    </div>
                                    <div class="col-mb-4 ">
                                        <label data-error="wrong" data-success="right">Type de Projet</label>
                                        <input type="text" id="typePrj" placeholder="Type du projet"
                                               v-model="projet.typePrj" name="typePrj" class="form-control validate">
                                        <div style="color:red;" v-if="projet.errors.has('typePrj')"
                                             v-html="projet.errors.get('typePrj')"/>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Designation</label>
                                        <textarea type="text" id="designationPrj" placeholder=" Designation du projet"
                                                  v-model="projet.designationPrj" name="designationPrj"
                                                  class="form-control validate"></textarea>
                                        <div style="color:red;" v-if="projet.errors.has('designationPrj')"
                                             v-html="projet.errors.get('designationPrj')"/>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right">Date d'ouverture</label>
                                        <input type="Date" id="dateOuverture" v-model="projet.dateOuverture"
                                               name="dateOuverture" class="form-control validate">
                                        <div style="color:red;" v-if="projet.errors.has('dateOuverture')"
                                             v-html="projet.errors.get('dateOuverture')"/>
                                    </div>
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Date Fin</label>
                                        <input type="Date" id="dateFin" v-model="projet.dateFin" name="dateFin"
                                               class="form-control validate">
                                        <div style="color:red;" v-if="projet.errors.has('dateFin')"
                                             v-html="projet.errors.get('dateFin')"/>
                                    </div>
                                    <div class="col-mb-4">
                                        <div class="col ">
                                            <label data-error="wrong" data-success="right">Wilaya :</label>
                                            <select v-model="projet.wilayas" class="form-control validate white-text">
                                                <option disabled value="">Selectionner wilayat</option>
                                                <option v-for="wilaya in wilayas" :key="wilaya.id" name="wilayas"
                                                        :value="wilaya.id">{{ wilaya.name }}
                                                </option>
                                            </select>
                                            <div style="color:red;" v-if="projet.errors.has('wilayas')"
                                                 v-html="projet.errors.get('wilayas')"/>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Demarcheur</label>
                                        <select v-model="projet.intervenant_id"
                                                class="form-control validate white-text">
                                            <option disabled value="">Selectionner intervenant</option>
                                            <option v-for="Intervenant in Intervenants" :key="Intervenant.id"
                                                    name="demarcheur"
                                                    :value="Intervenant.id">{{ Intervenant.users[0].nomUtilis }}
                                                {{ Intervenant.users[0].prenomUtilis }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="projet.errors.has('demarcheur')"
                                             v-html="projet.errors.get('demarcheur')"/>
                                    </div>
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Client</label>
                                        <select v-model="projet.client_id" class="form-control validate white-text">
                                            <option disabled value="">Selectionner client</option>
                                            <option v-for="client in clients" :key="client.id" name="client_id"
                                                    :value="client.id">{{ client.nomClt }} {{ client.prenomClt }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="projet.errors.has('client_id')"
                                             v-html="projet.errors.get('client_id')"/>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Raison d'Intervention</label>
                                        <select type="text" id="raisonIntervention" v-model="projet.raisonIntervention"
                                                name="raisonIntervention" class="form-control validate">
                                            <option disabled value="">Selectionner raison</option>
                                            <option value="Periodique"> Periodique</option>
                                            <option value="Extraordinaire">Extraordinaire</option>
                                        </select>
                                        <div style="color:red;" v-if="projet.errors.has('raisonIntervention')"
                                             v-html="projet.errors.get('raisonIntervention')"/>
                                    </div>
                                       <div class="col">
                                            <label data-error="wrong" data-success="right">Charge du projet</label>
                                           <select v-model="projet.chargePrj_id"
                                                   class="form-control validate white-text">
                                               <option disabled value="">Selectionner Charge du projet</option>
                                               <option v-for="chargePrj in chargePrjs" :key="chargePrj.id"
                                                       name="demarcheur"
                                                       :value="chargePrj.id">{{ chargePrj.users[0].nomUtilis }}
                                                   {{ chargePrj.users[0].prenomUtilis }}
                                               </option>
                                           </select>
                                            <div v-if="projet.errors.has('chargePrj_id')" v-html="projet.errors.get('chargePrj_id')" />
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
        <div class="modal fade" id="infotPrj" tabindex="-1" aria-labelledby="infotPrjLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image"
                     style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="infotPrjLabel"><strong>Detail
                                du</strong>
                                <a class="text-test font-weight-bold"> <strong>Projet </strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body ">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nom du projet
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.nomPrj |upText }} ,</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type de Projet
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.typePrj |upText }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Designation
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.designationPrj |upText }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date
                                        d'ouverture : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.dateOuverture }} ,</label>
                                </div>
                                <div class="col-7">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date Fin
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.dateFin }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Wilaya
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ wilayatest.name }}</label>
                                </div>
                            </div>

                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Client
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ clienttest.nomClt }} {{
                                            clienttest.prenomClt
                                        }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Demarcheur
                                        : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ user.nomUtilis |upText }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Raison
                                        d'Intervention : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.raisonIntervention |upText }}</label>
                                    <!--                                    <br>-->
                                    <!--                                    <label data-error="wrong" data-success="right"class="text-uppercase">Charge du projet : </label>-->
                                    <!--                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.nomPrj |upText}}</label>-->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger " data-dismiss="modal">Fermer</button>
                    </div>
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
            wilayaname: '',
            projets: {},
            wilayas: {},
            clients: {},
            chargePrjs: {},
            Intervenants: {},
            wilayatest: {},
            clienttest: {},
            Intervenanttest: {},
            projet: new Form({
                id: '',
                nomPrj: '',
                dateOuverture: '',
                dateFin: '',
                typePrj: '',
                wilayas: '',
                designationPrj: '',
                raisonIntervention: '',
                client_id: '',
                intervenant_id: '',
                    chargePrj_id :'',
            }),
            intervenant: new Form({
                id: '',
                nomUtilis: '',
                prenomUtilis: '',
                email: '',
                adressUtilis: '',
                tel: '',
                usertable_type: 'Intervenant',
                dateNUtilis: '',
                poste: '',
            }),
            user: new Form({
                id: '',
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
            this.tedtdt = false;
            this.projet.reset();
            $('#addNewPrj').modal('show')
        },
        editModal(projet) {
            if (this.$gate.isAgentTC()) {
                this.tedtdt = true;
                this.projet.reset();
                $('#addNewPrj').modal('show')

                this.projet.fill(projet);
            }
        },
        showModal(projet) {
            if (this.$gate.isAgentTC()) {
                $('#infotPrj').modal('show')
                this.projet.fill(projet);
                axios.get("api/wilayas/" + projet.wilayas).then(({data}) => (this.wilayatest = data));
                axios.get("api/intervenant/" + projet.intervenant_id).then(({data}) => (console.log(data[0]), this.Intervenanttest = data[0],
                        this.user.fill(data[0].users[0]),
                        this.intervenant.fill(data)
                ));
                axios.get("api/client/" + projet.client_id).then(({data}) => (this.clienttest = data));
                // this.getwailay(projet.wilayas)
            }
        },
        getwailay(wilayaid) {
            if (this.$gate.isAgentTC()) {
                axios.get("api/wilayas/" + wilayaid).then(({data}) => (this.wilayatest = data));
                this.wilayaname = this.wilayatest.name
                return this.wilayatest.name
            }
        },
        loadProjet() {
                if(this.$gate.isAgentTC() ||this.$gate.isDirecteur() ){
                axios.get("api/projet").then(({data}) => (this.projets = data));
            }
        },
        loadwilayas() {
                if(this.$gate.isAgentTC()||this.$gate.isDirecteur()){
                axios.get("api/wilayas").then(({data}) => (this.wilayas = data));
            }
        },
        loadclients() {
                if(this.$gate.isAgentTC()||this.$gate.isDirecteur()){
                axios.get("api/client").then(({data}) => (this.clients = data));
            }
        },
        loadchargePrjs() {
                if(this.$gate.isAgentTC()||this.$gate.isDirecteur()){
                axios.get("api/ChargePrj").then(({data}) => (this.chargePrjs = data));
            }
        },
        loadIntervenants() {
                if(this.$gate.isAgentTC()||this.$gate.isDirecteur()){
                axios.get("api/intervenant").then(({data}) => (this.Intervenants = data));
            }
        },
        ajoutProjet() {
            if (this.$gate.isAgentTC()) {
                this.$Progress.start();
                this.projet.post('/api/projet')
                    .then(() => {
                        Fire.$emit('apresAjout');
                        $('#addNewPrj').modal('hide');
                        this.intervenant.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Projet bien ajouté'
                        })
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        Toast.fire({
                            icon: 'error',
                            title: 'Veuillez remplir les champs correctement'
                        })
                        this.$Progress.fail()
                    })
            }
        },
        deleteProjet(id) {
            if (this.$gate.isAgentTC()) {
                Swal.fire({
                    title: 'Vous ête sur?',
                    text: "Vous ne pouvez plus revvenir en arrière!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, archiver le!'
                }).then((result) => {
                    if (result.value) {
                        this.intervenant.delete('api/projet/' + id)
                            .then((res) => {

                                Swal.fire(
                                    'bien archivé!',
                                    'project bien archivé.',
                                    'success'
                                )
                                Fire.$emit('apresAjout');
                            })
                            .catch(() => {
                                Swal.fire(
                                    'Failed!',
                                    'project non archivé!!',
                                    'warning'
                                )
                            })
                    }
                })

            }
        },

    },

    created() {
            if(this.$gate.isAgentTC()||this.$gate.isDirecteur()){
            this.loadProjet();
            this.loadIntervenants();
            this.loadclients();
            this.loadwilayas();
            this.loadchargePrjs();
            Fire.$on('apresAjout', () => {
                this.loadProjet();
                this.loadIntervenants();
                this.loadclients();
                this.loadwilayas();
                this.loadchargePrjs();
                // this.refresh();
            });
        }
    }
}
</script>

