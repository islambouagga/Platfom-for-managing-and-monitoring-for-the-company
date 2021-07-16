<!--suppress ALL -->
<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase ">
                    <h2 class="card-title" style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Liste des fiches non valides </h2>
                    <a href="#" class="d-block"> </a>
                    <div class="card-tools">
<!--                        <button class="btn btn-success"  @click="newModal()">-->
<!--                            <i class="fa fa-file-alt fa-fw"></i> + </button>-->
                    </div>
                </div>

                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher dans la liste des fiches </p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped" id="#myInput">
                            <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Date d'Essai</th>
                                <th scope="col">Nom Projet</th>
                                <th scope="col">Detail / Valider </th>
                            </tr></thead>
                            <tbody id="myTable">
                            <tr v-for=" fiche in fiches "  :key="fiche.id" v-if="fiche.valider===0">
                                <!--                            <tr>-->
                                <th scope="row">{{fiche.id}}</th>
                                <th scope="row">{{fiche.type}}</th>
                                <td>{{ fiche.created_at | myDate}}</td>
                                <td>{{fiche.dateEssai}}</td>
                                <td>{{fiche.projet_id }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(fiche)">
                                            <i class="fa fa-file-alt "></i> </button>&nbsp;
                                        <button class="btn btn-success" @click="editModal(fiche)">
                                            <i class="fa fa-edit "></i></button>&nbsp;
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

        <!-- Modal add and edit-->
        <div class="modal fade" id="addNewFiche" tabindex="-1" aria-labelledby="addNewFicheLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent=" tedtdt ? updateFiche() : AjoutFiche()" >
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

                            <div v-show="!tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue font-weight-bold" id="addNewFicheLabel"><strong>Ajouter</strong>
                                    <a class="text-test font-weight-bold"> <strong >Fiche </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div v-show="tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue font-weight-bold" id="addNewFicheLabel"><strong>Modifier / valider</strong>
                                    <a class="text-test font-weight-bold"> <strong >Fiche </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">

                                <div class="row">

                                    <div class="col">
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Date d'essai</label>
                                        <input v-model="Fiche.dateEssai" type="date" id="dateEssai" name="dateEssai"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('dateEssai')" v-html="Fiche.errors.get('dateEssai')" />
                                    </div>

                                    <!--     <div class="col ">
                                             <label data-error="wrong" data-success="right"   > Valider </label>
                                             <input v-model="Fiche.valider" value="false" type="tinyint" id="Valider" name="Valider" class="Fiche-control validate white-text">
                                         </div>  -->

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >  Provenance</label>
                                        <input v-model="Fiche.provenance" type="text" placeholder="Provenance" id="provenance" name="provenance"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('provenance')" v-html="Fiche.errors.get('provenance')" />
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right" >Destination</label>
                                        <input v-model="Fiche.destination" type="text" placeholder="Destination " id="destination" name="destination"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('destination')" v-html="Fiche.errors.get('destination')" />
                                    </div>

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Nombre d'element Controle</label>
                                        <input v-model="Fiche.nbrElemCntrl" type="number" placeholder=" Nombre " id="nbrElemCntrl" name="nbrElemCntrl"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('nbrElemCntrl')" v-html="Fiche.errors.get('nbrElemCntrl')" />
                                    </div>
                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Type Materiaux</label>
                                        <input v-model="Fiche.typeMateriaux" type="text" placeholder=" Type Materiaux" id="typeMateriaux" name="typeMateriaux"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('typeMateriaux')" v-html="Fiche.errors.get('typeMateriaux')" />
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Intervenant</label>
                                        <select v-model="Fiche.intervenant_id" class="form-control validate white-text">
                                            <option v-for="Intervenant in Intervenants" :key="Intervenant.id"
                                                    :value="Intervenant.id">{{ Intervenant.users[0].nomUtilis }}  {{ Intervenant.users[0].prenomUtilis }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="Fiche.errors.has('intervenant_id')" v-html="Fiche.errors.get('intervenant_id')" />
                                    </div>
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Projet</label>
                                        <select v-model="Fiche.projet_id" class="form-control validate white-text">
                                            <option v-for="projet in projets" :key="projet.id"
                                                    :value="projet.id">{{ projet.nomPrj }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="Fiche.errors.has('projet_id')" v-html="Fiche.errors.get('projet_id')" />
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <div class="col">
                                            <div class="form-check">
                                                <input v-model="Fiche.type" id="type1" value="Fiche.type" name="type"
                                                       class="form-check-input" type="radio" checked disabled>
                                                <label class="form-check-label" for="type1"> {{Fiche.type}} </label>
                                            </div>
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">  Voulez vous valider cette fiche ?</label>
                                        <div class="form-check">
                                            <input v-model="Fiche.valider" id="valider1" value="1" name="raliserPar"
                                               class="form-check-input" type="radio">
                                            <label class="form-check-label" for="valider1"> OUI </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input v-model="Fiche.valider" id="valider2" value="0" name="raliserPar"
                                                   class="form-check-input" type="radio">
                                            <label class="form-check-label" for="valider2"> NON </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Annuler</button>
                            <button v-show="!tedtdt" type="submit" class="btn btn-primary">Ajouter</button>
                            <button v-show="tedtdt" type="submit" class="btn btn-success">Vlider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Information-->
        <div class="modal fade" id="infoFiche" tabindex="-1" aria-labelledby="infoFichelLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">


                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="infoFicheLabel"><strong>Detail de</strong>
                                <a class="text-test font-weight-bold"> <strong >La fiche </strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" >
                            <div class="row">
                                <div class="col ">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">ID :  </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.id}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type :  </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.type}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase"> Realise par : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis }}</label>
                                </div>
                            </div>
                            <hr style="height:2px; color: black; width:40%">

                            <div class="row">
                                <div class="col ">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.created_at  | myDate}} </label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date d'essai : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.dateEssai}}</label>
                                </div>
                            </div>
                            <hr style="height:6px; color:black;width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">  Provenance : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.provenance }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Destination : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.destination }}</label>
                                </div>
                            </div>
                            <hr style="height:6px; color:black; width:40%">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nombre d'element Controle : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.nbrElemCntrl }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type Materiaux : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.typeMateriaux }}</label>
                                </div>
                            </div>

                            <hr style="height:6px; color:black;width:40%">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Intervenant : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right"class="text-uppercase">Projet : </label>
                                    <label data-error="wrong" data-success="right" class="text-green text-uppercase">{{projettest.nomPrj }}</label>
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
            fiches: {},
            Intervenants: {},
            projets: {},
            projettest: {},
            Intervenanttest: {},
            Fiche: new Form({
                id: '',
                date:'',
                //valider: '',
                typeMateriaux: '',
                provenance: '',
                destination: '',
                nbrElemCntrl: '',
                dateEssai: '',
                raliserPar: '',
                intervenant_id: '',
                created_at: '',
                projet_id: '',
                type: '',
            }),
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
                //     chargePrj_id :'',
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
            if (this.$gate.isChargePrj()) {
                this.tedtdt = false;
                this.Fiche.reset();
                $('#addNewFiche').modal('show')
            }
        },
        editModal(Fiche) {
            if (this.$gate.isChargePrj()) {
                this.tedtdt = true;
                this.Fiche.reset();
                $('#addNewFiche').modal('show')
                this.Fiche.fill(Fiche);
            }
        },
        showModal(Fiche) {
            if (this.$gate.isChargePrj()) {
                $('#infoFiche').modal('show')
                this.Fiche.fill(Fiche);
                axios.get("api/intervenant/" + Fiche.intervenant_id).then(({data}) => (this.Intervenanttest = data[0],
                        this.user.fill(data[0].users[0]),
                        this.intervenant.fill(data)
                ));
                axios.get("api/projet/" + Fiche.projet_id).then(({data}) => (this.projettest = data));
                // this.getwailay(projet.wilayas)
            }
        },

        loadFiches() {
            if (this.$gate.isChargePrj()) {
                axios.get("api/fiche").then(({data}) => (this.fiches = data));
            }
        },
        loadIntervenants() {
            if (this.$gate.isChargePrj()) {
                axios.get("api/intervenant").then(({data}) => (this.Intervenants = data));
            }
        },
        loadProjet() {
            if (this.$gate.isChargePrj()) {
                axios.get("api/projet").then(({data}) => (this.projets = data));
            }
        },
        AjoutFiche() {
            if (this.$gate.isChargePrj()) {
                this.$Progress.start();
                this.Fiche.post('/api/fiche')
                    .then(() => {
                        Fire.$emit('apresAjout');
                        $('#addNewFiche').modal('hide');
                        // this.Fiche.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Fiche bien ajouté'
                        })
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        // console.log(e)
                        Toast.fire({
                            icon: 'error',
                            title: 'Veuillez remplir les champs correctement'
                        })
                        this.$Progress.fail()
                    })
            }
        },
        updateFiche() {

            if (this.$gate.isChargePrj()) {
                this.$Progress.start();
                this.Fiche.put('api/fiche/' + this.Fiche.id)
                    .then(() => {
                        Fire.$emit('apresAjout');
                        $('#addNewFiche').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Fiche bien modifié'
                        });
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
    },
    created() {
        if (this.$gate.isChargePrj()) {
            this.loadFiches();
            this.loadIntervenants();
            this.loadProjet();
            Fire.$on('apresAjout', () => {
                this.loadFiches();
                this.loadIntervenants();
                this.loadProjet();
            });

        }
    }
}
</script>



