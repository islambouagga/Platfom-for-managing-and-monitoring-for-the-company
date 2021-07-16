<!--suppress ALL -->
<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-uppercase ">
                    <h2 class="card-title" style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Liste des fiches valides </h2>
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
                                <th scope="col">DateEssai</th>
                                <th scope="col">Nom Projet</th>
                                <th scope="col">Detail / Excel </th>
                            </tr></thead>
                            <tbody id="myTable">
                            <tr v-for=" fiche in fiches "  :key="fiche.id" v-if="fiche.valider===1">
                                <!--                            <tr>-->
                                <th scope="row">{{fiche.id}}</th>
                                <th scope="row">{{fiche.type}}</th>
                                <td>{{ fiche.date }}</td>
                                <td>{{fiche.dateEssai}}</td>
                                <td>{{fiche.projet_id }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(fiche)"
                                                v-if="$gate.isDirecteur() || $gate.isChargePrj() ">
                                            <i class="fa fa-file-alt "></i> </button>&nbsp;
                                        <button class="btn btn-success" @click="imprimerModal(fiche)"
                                                v-if="$gate.isDirecteur() || $gate.isChargePrj() ">
                                            <i class="fa fa-file-excel "></i>
                                        </button>&nbsp;
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
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.raliserPar |upText}}</label>
                                </div>
                            </div>
                            <hr style="height:2px; color: black; width:40%">

                            <div class="row">
                                <div class="col ">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.date}} </label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date d'essai : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.dateEssai}}</label>
                                </div>
                            </div>
                            <hr style="height:6px; color:black;width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">  Provenance : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.provenance |upText}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Destination : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.destination |upText}}</label>
                                </div>
                            </div>
                            <hr style="height:6px; color:black; width:40%">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nombre d'element Controle : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.nbrElemCntrl }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type Materiaux : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{Fiche.typeMateriaux |upText}}</label>
                                </div>
                            </div>

                            <hr style="height:6px; color:black;width:40%">
                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Intervenant : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis |upText}}</label>
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
                date: '',
                //valider: '',
                typeMateriaux: '',
                provenance: '',
                destination: '',
                nbrElemCntrl: '',
                dateEssai: '',
                raliserPar: '',
                intervenant_id: '',
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
        showModal(Fiche) {
            if (this.$gate.isChargePrj() || this.$gate.isDirecteur()) {
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
            if (this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/fiche").then(({data}) => (this.fiches = data));
            }
        },
        loadIntervenants() {
            if (this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/intervenant").then(({data}) => (this.Intervenants = data));
            }
        },
        loadProjet() {
            if (this.$gate.isChargePrj() || this.$gate.isDirecteur()){
                axios.get("api/projet").then(({data}) => (this.projets = data));
            }
        },
    },
    created() {
        if (this.$gate.isChargePrj() || this.$gate.isDirecteur()) {
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



