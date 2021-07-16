<template>
    <div class="container mt-12">
        <br>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-uppercase" style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;">Projets et fiches de suivi </h2>

                </div>
                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher dan la liste des projet :</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <div style="border-style: outset;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Nom </th>
                                    <th scope="col">Wilaya</th>
                                    <th scope="col">Date d'ouverture</th>
                                    <th scope="col">Date Fin</th>
                                    <th scope="col">Consulter Projet</th>
                                    <th scope="col">Consulter Fiches</th>

                                </tr></thead>
                                <tbody id="myTable">
                                <tr>
                                <tr v-for="projet in projets" :key="projet.id" v-if="projet.chargePrj_id ===userconcted.usertable_id">
                                    <th scope="row">{{projet.id}}</th>
                                    <td>{{projet.nomPrj}}</td>
                                    <td>{{projet.wilayas}}</td>
                                    <td>{{projet.dateOuverture}}</td>
                                    <td>{{projet.dateFin}}</td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-secondary" @click="showModal(projet)">
                                                <i class="fa fa-file-alt "></i> </button>&nbsp;
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-success" @click="showModal2(projet)">
                                                <i class="fa fa-file-alt "></i> </button>&nbsp;
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- /.table____________________________________________________- -->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal Information-->
        <div class="modal fade" id="infotPrj" tabindex="-1" aria-labelledby="infotPrjLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                    <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                        <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="infotPrjLabel"><strong>Detail du</strong>
                                <a class="text-test font-weight-bold"> <strong >Projet </strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body ">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nom du projet : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.nomPrj |upText}} ,</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type de Projet : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.typePrj |upText}}</label>
                                </div></div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Designation : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.designationPrj |upText}}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date d'ouverture : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.dateOuverture}} ,</label>
                                </div>
                                <div class="col-7">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date Fin : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.dateFin}}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Wilaya : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{wilayatest.name }}</label>
                                </div>
                            </div>

                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Client : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{clienttest.nomClt }} {{clienttest.prenomClt }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase" >Demarcheur :  </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis |upText}}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase" >Raison d'Intervention : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.raisonIntervention |upText}}</label>
                                    <!--                                    <br>-->
                                    <!--                                    <label data-error="wrong" data-success="right"class="text-uppercase">Charge du projet : </label>-->
                                    <!--                                    <label data-error="wrong" data-success="right" class="text-green ">{{projet.nomPrj |upText}}</label>-->
                                    <!--                                -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger " @click="closeModel()">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Fiche Table -->
        <div class="modal fade" id="ConsulterFiche" tabindex="-1" aria-labelledby="ConsulterFicheLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                    <div class="modal-header text-center pb-4">
                        <h3 class="modal-title w-100 text-blue  font-weight-bold" id="ConsulterFicheLabel">
                            <strong>Fiches lié á ce projet</strong></h3>
                        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body ">
                        <div class="col-md-12">
                            <div class="card" style="border: ridge;">
                                <div class="card-header text-uppercase ">
                                    <h2 class="card-title" style=" font-weight:
                                         800; font-size: 20px; color: #DE6262;"> Liste des fiches  </h2>
                                    <a href="#" class="d-block"> </a>
                                    <div class="card-tools">
                                        <!--                                            <button class="btn btn-success" @click=""-->
                                        <!--                                                    v-if="$gate.isDirecteur() || $gate.isChargePrj() ">-->
                                        <!--                                                <i class="fa fa-file-excel ">&nbsp; Générer en Excel la liste</i>-->
                                        <!--                                            </button>&nbsp;-->
                                        <div>
                                            <download-excel :data="json_data"  v-if="$gate.isDirecteur() || $gate.isChargePrj() ">
                                                <button type="button" class="btn btn-success">Générer en Excel la liste</button>
                                            </download-excel>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.table Fiche____________________________________________________- -->
                                <div class="card-body">
                                    <div class="container">
                                        <p> Chercher dans la liste des fiches </p>
                                        <input class="form-control" id="myInput2" type="text" placeholder="Search..">
                                        <br>
                                        <table class="table table-bordered table-striped" id="#myInput2">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID fiche</th>
                                                <th scope="col">Type</th>
<!--                                                <th scope="col">Realiser par</th>-->
                                                <th scope="col">Date</th>
                                                <th scope="col">DateEssai</th>
                                                <th scope="col">Projet</th>
                                                <th scope="col">Action</th>
                                            </tr></thead>
                                            <tbody id="myTable2" >
                                            <tr v-for=" fiche in fiches"  v-if=" fiche.valider===1">
                                                <!--                            <tr>-->
                                                <th scope="row">{{fiche.id}}</th>
                                                <td>{{ fiche.type }}</td>
<!--                                                <td>{{ fiche.raliserPar }}</td>-->
                                                <td>{{ fiche.created_at | myDate }}</td>
                                                <td>{{fiche.dateEssai}}</td>
                                                <td>{{projet.nomPrj }}</td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <button class="btn btn-secondary" @click="showModal3(fiche)">
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

                        <!-- Modal Information de la Fiche -->
                        <div  class="modal fade" id="infoFiche" tabindex="-1" aria-labelledby="infoFichelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg form-dark" role="document">
                                <div class="modal-content card card-image"  style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                                    <div id="printMe" class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                                        <div class="modal-header text-center pb-4">
                                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="infoFicheLabel"><strong>Detail de</strong>
                                                <a class="text-test font-weight-bold"> <strong ><h2> l'intervenation</h2> </strong></a></h3>
                                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body" >
                                            <table class="table table-bordered">

                                                <tbody style="background-color: white; text-align: left;">
                                                <tr>
                                                    <td colspan="4">Projet : {{projet.nomPrj }}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">No : {{Fiche.id}}</td>
                                                    <td colspan="2">Type : {{Fiche.type}}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">Date : {{Fiche.created_at | myDate}}</td>
                                                    <td colspan="2"> Date d'essai : {{Fiche.dateEssai}}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">Intervenant :{{user.nomUtilis |upText}} {{user.prenomUtilis |upText}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Provenance :{{Fiche.provenance |upText}}</td>
                                                    <td colspan="2">Destination :{{Fiche.destination |upText}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Nombre d'element Controle : {{Fiche.nbrElemCntrl }}</td>
                                                    <td colspan="2">Type Materiaux : {{Fiche.typeMateriaux |upText}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="margin-top: 10px">
                                        <button class="btn btn-success" @click="print"
                                                v-if="$gate.isDirecteur() || $gate.isChargePrj() ">
                                            <i class="fa fa-file-excel ">&nbsp; Imprimer la fiche</i>
                                        </button>
                                        <button type="button" class="btn btn-danger "  @click="closeModel3()">Fermer</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger "  @click="closeModel2()">Fermer</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
import Form from "vform";
import Dashboard from "./Dashboard";
export default {
    components: {Dashboard},
    data() {
        return {
            output: null,
            tedtdt: false,
            userconcted: window.user,
            wilayaname:'',
            fiches :{},
            projets :{},
            wilayas :{},
            arraywilayas :[],
            clients :{},
            Intervenants :{},
            Intervenanttest :{},
            wilayatest :{},
            clienttest :{},
            projettest2 :{},
            json_data: [],
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
                chargePrj_id :'',
            }),
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
            }),
            Fiche: new Form({
                id: '',
                created_at: '',
                //valider: '',
                typeMateriaux: '',
                provenance: '',
                destination: '',
                nbrElemCntrl: '',
                dateEssai: '',
                raliserPar: '',
                intervenant_id: '',
                projet_id: '',
                type:'',
            }),
        }
    },
    methods: {
        print() {
            // Pass the element id here
            this.$htmlToPaper('printMe');
        },
        showModal(projet){
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                $('#infotPrj').modal('show')
                this.projet.fill(projet);
                axios.get("api/wilayas/"+projet.wilayas).then(({data}) => (this.wilayatest = data));
                axios.get("api/intervenant/"+projet.intervenant_id).then(({data}) => ( this.Intervenanttest = data[0],
                        this.user.fill(data[0].users[0]),
                        this.intervenant.fill(data)
                ));
                axios.get("api/client/"+projet.client_id).then(({data}) => (this.clienttest = data));
                // this.getwailay(projet.wilayas)
            }},
        closeModel(){
            $('#infotPrj').modal('hide')
        },

        showModal2(projet){
            console.log(projet.fiches)
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                this.projet.fill(projet);
                this.fiches = projet.fiches
                this.json_data = projet.fiches
                axios.get("api/wilayas/"+projet.wilayas).then(({data}) => (this.wilayatest = data));
                axios.get("api/intervenant/"+projet.intervenant_id).then(({data}) => ( this.intervenant = data[0],
                        this.user.fill(data[0].users[0])
                ));
                axios.get("api/client/"+projet.client_id).then(({data}) => (this.clienttest = data));
                $('#ConsulterFiche').modal('show');
            }},

        closeModel2(){
            $('#ConsulterFiche').modal('hide');
        },

        showModal3(Fiche){
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                console.log(Fiche);
                // this.Fiche.reset();
                $('#infoFiche').modal('show')
                this.Fiche.fill(Fiche);
            }},

        closeModel3(){
            $('#infoFiche').modal('hide')
        },

        getwailay(wilayaid){
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/wilayas/"+wilayaid).then(({data}) => (this.wilayatest = data));
                this.wilayaname = this.wilayatest.name
                return this.wilayatest.name
            }},

        loadProjet () {
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/projet").then(({ data }) => (this.projets = data));
            }},
        loadFiches () {
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                // axios.get("api/fiche").then(({ data }) => (this.fiches = data));
            }},
        loadwilayas () {
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/wilayas").then(({ data }) => (this.wilayas = data
                ));
            }},
        loadclients () {
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/client").then(({ data }) => (this.clients = data));
            }},
        loadIntervenants () {
            if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/intervenant").then(({ data }) => (this.Intervenants = data));
            }},
    },

    created() {
        if(this.$gate.isChargePrj() || this.$gate.isDirecteur()){
            this.loadProjet();
            this.loadIntervenants();
            this.loadclients();
            this.loadwilayas();
            this.loadFiches();
            Fire.$on('apresAjout',() => {
                this.loadProjet();
                this.loadIntervenants();
                this.loadclients();
                this.loadwilayas();
                this.loadFiches();
                // this.refresh();
            });
        }}
}
</script>

