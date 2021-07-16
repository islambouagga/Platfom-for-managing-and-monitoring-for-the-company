<template>
    <div class=" container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-uppercase"
                        style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Manipulet les intervenant dans un projet </h2>
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
<!--                                <th scope="col">index</th>-->
                                <th scope="col">Manipuler Intervenant</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <tr>
                            <tr v-for="(projet,index ) in projets" :key="projet.id" v-if="projet.chargePrj_id ===userconcted.usertable_id">
                                <th scope="row">
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(projet)">
                                            <i class="fa fa-file-alt "></i>&nbsp; {{ projet.id }}
                                        </button>
                                    </div>
                                </th>
                                <td>{{ projet.nomPrj }} &nbsp;</td>
                                <td>
                                    <multiselect v-model="value[index]" :options="options" :multiple="true"
                                                 :close-on-select="false" :clear-on-select="false"
                                                 :preserve-search="true" placeholder="Slectionner intervenants"
                                                 label="nomUtilis"
                                                 track-by="usertable_id" :preselect-first="false">
                                        <template slot="selection" slot-scope="{ values, search, isOpen  }"><span
                                            class="multiselect__single" v-if="values.length &amp;&amp;  !isOpen">
                                                <span  v-for="(valu, ind  )   in values "
                                                      :value="valu.id"> {{
                                                        valu.nomUtilis
                                                    }}  {{ valu.prenomUtilis
                                                    }}    <button
                                                        class="btn  "
                                                        @click="getItemIndex(ind,index )">
                                   ❌
                                    </button>   </span>


                                            </span>
                                        </template>
                                    </multiselect>
                                </td>
                                <td>
                                    <button class="btn btn-success" @click="sendArrayIntervenant_ids(projet.id , index )">
                                        Affecter/Desaffecter
                                    </button>
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
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            projet.nomPrj
                                                |upText
                                        }} ,</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type de Projet
                                        : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            projet.typePrj
                                                |upText
                                        }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Designation
                                        : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            projet.designationPrj
                                                |upText
                                        }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date
                                        d'ouverture : </label>
                                    <label data-error="wrong" data-success="right"
                                           class="text-green ">{{ projet.dateOuverture }}
                                        ,</label>
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
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            wilayatest.name
                                        }}</label>
                                </div>
                            </div>

                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Client
                                        : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            clienttest.nomClt
                                        }} {{ clienttest.prenomClt }}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Demarcheur
                                        : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            user.nomUtilis
                                                |upText
                                        }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Raison
                                        d'Intervention : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{
                                            projet.raisonIntervention
                                                |upText
                                        }}</label>
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

    </div>
</template>

<script>
import Form from "vform";

export default {
    data() {
        return {
            co: null,
            value: null,
            userconcted: window.user,
            options: [],
            isLoading: false,
            Intervenants: {},
            wilayaname: '',
            fiches: {},
            projets: null,
            wilayas: {},
            clients: {},
            Intervenanttest: {},
            wilayatest: {},
            clienttest: {},
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
            }),
        }
    },

    methods: {

        showModal(projet) {
            $('#infotPrj').modal('show')
            this.projet.fill(projet);
            axios.get("api/wilayas/" + projet.wilayas).then(({data}) => (this.wilayatest = data));
            axios.get("api/intervenant/" + projet.intervenant_id).then(({data}) => (this.Intervenanttest = data[0],
                    this.user.fill(data[0].users[0]),
                    this.intervenant.fill(data)
            ));
            axios.get("api/client/" + projet.client_id).then(({data}) => (this.clienttest = data));
            // this.getwailay(projet.wilayas)
        },
        closeModel() {
            $('#infotPrj').modal('hide')
        },
        getwailay(wilayaid) {
            if(this.$gate.isChargePrj()) {
                axios.get("api/wilayas/" + wilayaid).then(({data}) => (this.wilayatest = data));
                this.wilayaname = this.wilayatest.name
                return this.wilayatest.name
            }
        },
        loadProjet() {
            if(this.$gate.isChargePrj()){
            let arrayOfValuesArrays = [];
            let arrayOfUsersOfIntrv = [];
            let arrayOfusers = [];
            let arrayOfintervenantsIdsArrays = [];
            axios.get("api/projet").then(({data}) => (this.projets = data,

                    data.forEach(function (item) {
                        // console.log(item.intervenants)
                        arrayOfValuesArrays.push(item.intervenants)

                    }),
                    arrayOfValuesArrays.forEach(function (item , index ) {
                        // console.log("1")
                        // console.log(arrayOfValuesArrays[index])

                        arrayOfValuesArrays[index].forEach(function (item) {
                            // console.log(item.users[0])
                            arrayOfusers.push(item.users[0])

                        })
                        arrayOfUsersOfIntrv.push(arrayOfusers)
                        arrayOfusers = [];


                    }),
                    this.value = arrayOfUsersOfIntrv
            ));


        }},
        loadFiches() {
            if(this.$gate.isChargePrj()){
            axios.get("api/fiche").then(({data}) => (this.fiches = data));
        }},
        loadwilayas() {
            if(this.$gate.isChargePrj()){
            axios.get("api/wilayas").then(({data}) => (this.wilayas = data));
        }},
        loadclients() {
            if(this.$gate.isChargePrj()) {
                axios.get("api/client").then(({data}) => (this.clients = data));
            }
        },
        loadIntervenants() {
            if(this.$gate.isChargePrj()){
            let array = [];
            axios.get("api/intervenant").then(({data}) => (this.Intervenants = data ,

                    data.forEach(function (id) {
                        array.push(id.users[0])
                    }),
                    this.options = array
            ));
        }},

        sendArrayIntervenant_ids(projetid , index ) {
            if(this.$gate.isChargePrj()){
            console.log("project id ")
            console.log(projetid)

            console.log("index ")
            console.log(index)
            console.log("project valu ")
            console.log(this.value[index])
            let arrayIds = [];
            this.value[index].forEach(function (item , index ) {
                    console.log("items")
                    console.log(item)
                    arrayIds.push(item.usertable_id)

            })
            console.log("arrayIds")
            console.log(arrayIds)
                this.$Progress.start()
            axios.post('api/affecter', {
                projet_id: projetid,
                arrayIntervenant_ids: arrayIds
            })
                .then(function (response) {

                    console.log(response);
                    Fire.$emit('AfterCreate');
                    $('#addNewClt').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Bien enregistré'
                    })
                    this.$Progress.finish()
                })
                .catch(function (error) {
                    console.log(error);
                    this.$Progress.fail()
                });

        }},


        getItemIndex(ind , index ){
            if(this.$gate.isChargePrj()){
          //   console.log('value'+index+' befor delte ')
          //   console.log(this.value[index])
          // console.log('index of int in value')
          // console.log(ind)
          // console.log("index of project ")
          // console.log(index)
          // console.log('deleted item is ' +ind)
            var removed = this.value[index].splice(ind,1)
            // console.log('removed' )
            // console.log(removed)

            // console.log('value'+index+' after  delte ')
            // console.log(this.value[index])
        }},

    },



    created() {
        if(this.$gate.isChargePrj()){
        this.loadProjet();
        this.loadIntervenants();
        this.loadclients();
        this.loadwilayas();
    }
}}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
