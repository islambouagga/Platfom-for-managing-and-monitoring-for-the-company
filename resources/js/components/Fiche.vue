<!--suppress ALL -->
<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase ">
                    <h2 class="card-title" style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Fiches laboratoire </h2>
                    <a href="#" class="d-block"> </a>
                    <div class="card-tools">
                        <button class="btn btn-success"  @click="newModal()">
                            <i class="fa fa-file-alt fa-fw"></i> + </button>
                    </div>
                </div>

                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher dans la liste des fiches laboratoire:</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped" id="#myInput">
                            <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Date d'Essai</th>
                                <th scope="col">Projet</th>
                                <th scope="col">Action</th>
                            </tr></thead>
                            <tbody id="myTable">
                            <tr v-for=" fiche in fiches" :key="fiche.id" v-if="fiche.type==='Fiche Laboratoire'">
<!--                            <tr>-->
                                <th scope="row">{{fiche.id}}</th>
                                <td>{{ fiche.type }}</td>
                                <td>{{ fiche.created_at | myDate }}</td>
                                <td>{{fiche.dateEssai}}</td>
                                <td>{{fiche.projet_id }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(fiche)">
                                            <i class="fa fa-file-alt "></i> </button>&nbsp;
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
        <div class="modal fade" id="addNewFiche" tabindex="-1" aria-labelledby="addNewFicheLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent="AjoutFiche" >
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                            <div class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue font-weight-bold" id="addNewFicheLabel"><strong>Ajouter</strong>
                                    <a class="text-test font-weight-bold"> <strong >Fiche d'essai laboratoire </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">
                                <div class="row">
<!--                                    <div class="col">-->
<!--                                        <label data-error="wrong" data-success="right"   >  Realiser par :</label>-->
<!--                                        <input v-model="Fiche.raliserPar" placeholder=" Realisateur de la fiche" type="text" id="raliserPar" name="raliserPar"  class="form-control validate white-text">-->
<!--                                        <div style="color:red;" v-if="Fiche.errors.has('raliserPar')" v-html="Fiche.errors.get('raliserPar')" />-->
<!--                                    </div>-->
<!--                                    <div class="col ">-->
<!--                                        <label data-error="wrong" data-success="right" class="text-uppercase">Date </label>-->
<!--                                        <input v-model="Fiche.date" type="date" id="date" name="date" class="form-control validate white-text">-->
<!--                                        <div style="color:red;" v-if="Fiche.errors.has('date')" v-html="Fiche.errors.get('date')" />-->
<!--                                    </div>-->


                               <!--     <div class="col ">
                                        <label data-error="wrong" data-success="right"   > Valider </label>
                                        <input v-model="Fiche.valider" value="false" type="tinyint" id="Valider" name="Valider" class="Fiche-control validate white-text">
                                    </div>  -->

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Date d'essai</label>
                                        <input v-model="Fiche.dateEssai" type="date" id="dateEssai" name="dateEssai"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="Fiche.errors.has('dateEssai')" v-html="Fiche.errors.get('dateEssai')" />
                                    </div>

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
                                        <label data-error="wrong" data-success="right">Projet</label>
                                        <select v-model="Fiche.projet_id" class="form-control validate white-text">
                                            <option disabled value="">Selectionner projet</option>
                                            <option v-for="projet in projets" :key="projet.id"
                                                    :value="projet.id">{{ projet.nomPrj }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="Fiche.errors.has('projet_id')" v-html="Fiche.errors.get('projet_id')" />
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
        <div class="modal fade" id="infoFiche" tabindex="-1" aria-labelledby="infoFichelLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">


                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="infoFicheLabel"><strong>Detail de</strong>
                                <a class="text-test font-weight-bold"> <strong >Fiche d'essai laboratoir </strong></a></h3>
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
                                    <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis |upText}} {{user.prenomUtilis }}</label>
                                </div>
                            </div>
                            <hr style="height:2px; color: black; width:40%">

                            <div class="row">
                                <div class="col ">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.created_at | myDate}} </label>
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
            projets: {},
            projettest :{},
            Intervenanttest :{},
            Fiche: new Form({
                id: '',
                // date: '',
                //valider: '',
                typeMateriaux: '',
                provenance: '',
                destination: '',
                nbrElemCntrl: '',
                dateEssai: '',
                raliserPar: '',
                intervenant_id: '',
                projet_id: '',
                created_at: '',
                type :'Fiche Laboratoire',
            }),
            projet: new Form({
                id:'',
                nomPrj : '',
                dateOuverture : '',
                dateFin :'',
                typePrj :'',
                wilayas :'',
                designationPrj :'',
                raisonIntervention : '',
                client_id :'',
                intervenant_id :'',
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
            if(this.$gate.isIntervenant){
            this.Fiche.reset();
            $('#addNewFiche').modal('show')
        }},
        editModal(Fiche) {
            if(this.$gate.isIntervenant) {
                this.tedtdt = true;
                this.Fiche.reset();
                $('#addNewFiche').modal('show')
                this.Fiche.fill(Fiche);
            }
        },
        showModal(Fiche){
            if(this.$gate.isIntervenant) {
                $('#infoFiche').modal('show')
                this.Fiche.fill(Fiche);
                axios.get("api/intervenant/" + Fiche.intervenant_id).then(({data}) => (this.Intervenanttest = data[0],
                        this.user.fill(data[0].users[0]),
                        this.intervenant.fill(data)
                ));
                axios.get("api/projet/" + Fiche.projet_id).then(({data}) => (this.projettest = data));
                // this.getwailay(projet.wilayas)
            }},

        loadFiches () {
            if(this.$gate.isIntervenant){
            axios.get("api/fiche").then(({ data }) => (this.fiches = data));
        }},
        loadProjet () {
            if(this.$gate.isIntervenant){
            axios.get("api/projet").then(({ data }) => (this.projets = data));
        }},
        AjoutFiche() {
            if(this.$gate.isIntervenant){
            this.$Progress.start();
            this.Fiche.post('api/fiche')
                .then(() => {
                    Fire.$emit('apresAjout');
                    $('#addNewFiche').modal('hide');
                    this.Fiche.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Fiche bien ajouté'
                    })
                    this.$Progress.finish();

                })
                .catch((e)=>{
                    console.log(e)
                    Toast.fire({
                        icon: 'error',
                        title: 'Veuillez remplir les champs correctement'
                    })
                    this.$Progress.fail()
                })
        }}
    },
    created() {
        if(this.$gate.isIntervenant){
        this.loadFiches();
        this.loadProjet();
        Fire.$on('apresAjout',() => {
            this.loadFiches();
            this.loadIntervenants();
            this.loadProjet();
        });

    }}
}
</script>



