<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-uppercase"
                        style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Clients </h2>
                    <div class="card-tools">
                        <button class="btn btn-success" @click="newModal()" v-if="$gate.isAgentTC()">
                            <i class="fa fa-user-plus fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher par Nom, Prenom, Numero de Telephone ou Emails:</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <tr v-for="client in clients" :key="client.id">
                                <th scope="row">{{ client.id }}</th>
                                <td>{{ client.nomClt }}</td>
                                <td>{{ client.prenomClt }}</td>
                                <td>{{ client.tel }}</td>
                                <td>{{ client.emailClt }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(client)"
                                                v-if="$gate.isAgentTC() || $gate.isDirecteur()">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-primary" @click="editModal(client)"
                                                v-if="$gate.isAgentTC() ">
                                            <i class="fa fa-edit "></i></button>&nbsp;
                                        <button class="btn btn-danger" @click="deleteClient(client.id)"
                                                v-if="$gate.isAgentTC() ">
                                            <i class="fa fa-trash-alt "></i></button>
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


        <!-- Modal add and edit -->
        <div class="modal fade" id="addNewClt" tabindex="-1" aria-labelledby="addNewCltLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image"
                     style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent=" tedtdt ? updateClient() : ajoutClient()">
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

                            <div v-show="!tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold" id="addNewCltLabel"><strong>Ajouter</strong>
                                    <a class="text-test font-weight-bold"> <strong>Client </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div v-show="tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold"><strong>Modifier</strong>
                                    <a class="text-test font-weight-bold"> <strong>Client </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Nom</label>
                                        <input v-model="client.nomClt" type="text" id="nomClt" name="nomClt"
                                               placeholder="Nom du client" class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('nomClt')" v-html="client.errors.get('nomClt')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Prenom :</label>
                                        <input v-model="client.prenomClt" type="text" id="prenomClt" name="prenomClt"
                                               placeholder="Prenom du client"
                                               class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('prenomClt')"
                                             v-html="client.errors.get('prenomClt')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Date de naissance :</label>
                                        <input v-model="client.dateNClt" type="date" id="dateNClt" name="dateNClt"
                                               class="form-control validate white-text" placeholder="01/02/1996">
                                        <div style="color:red;" v-if="client.errors.has('dateNClt')"
                                             v-html="client.errors.get('dateNClt')"/>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                            <label data-error="wrong" data-success="right">Raison sociale : </label>

                                            <select v-model="client.raisonSociale" type="text" id="raisonSociale"
                                                    name="raisonSociale" class="form-control validate white-text">
                                                <option disabled value="">Selectionner raison</option>
                                                <option value="SARL" >SARL</option>
                                                <option value="EURL">EURL</option>
                                                <option value="SA">SPA</option>
                                                <option value="SNC">SNC</option>
                                            </select>

                                            <div style="color:red;" v-if="client.errors.has('raisonSociale')" v-html="client.errors.get('raisonSociale')"/>
                                        </div>
                                    <div class="col">
                                            <label data-error="wrong" data-success="right">Type du client :</label>
                                            <select v-model="client.type" type="text" id="type" name="type"
                                                    class="form-control validate white-text">
                                                <option disabled value="">Selectionner type d'Entreprise</option>
                                                <option selected value="étatique">Entreprise étatique</option>
                                                <option value="privé">Entreprise privé</option>
                                                <option value="physique">Entreprise physique</option>
                                            </select>
                                            <div style="color:red;" v-if="client.errors.has('type')" v-html="client.errors.get('type')"/>
                                        </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Désignation :</label>
                                        <textarea v-model="client.designationClt" type="text" id="designationClt"
                                                  name="designationClt" class="form-control validate white-text" placeholder="Designation de client"></textarea>
                                        <div style="color:red;" v-if="client.errors.has('designationClt')"
                                             v-html="client.errors.get('designationClt')"/>
                                    </div>
                                </div>

                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">E-mail :</label>
                                        <input v-model="client.emailClt" type="email" id="emailClt" name="nomClt"
                                               placeholder="Email" class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('emailClt')"
                                             v-html="client.errors.get('emailClt')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Numéro de téléphone : </label>
                                        <input v-model="client.tel" type="number" id="tel" name="tel"
                                               class="form-control validate white-text" placeholder="0771234567">
                                        <div style="color:red;" v-if="client.errors.has('tel')" v-html="client.errors.get('tel')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Numéro de fax :</label>
                                        <input v-model="client.fax" type="text" id="fax" name="fax"
                                               class="form-control validate white-text" placeholder="027 50 45 35">
                                        <div style="color:red;" v-if="client.errors.has('fax')" v-html="client.errors.get('fax')"/>
                                    </div>

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Wilaya :</label>
                                        <select v-model="client.wilayas" class="form-control validate white-text">
                                            <option disabled value="">Selectionner wilaya</option>
                                            <option v-for="wilaya in wilayas" :key="wilaya.id" name="wilayas"
                                                    :value="wilaya.id">{{ wilaya.name }}
                                            </option>
                                        </select>
                                        <div style="color:red;" v-if="client.errors.has('wilayas')" v-html="client.errors.get('wilayas')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Adresse :</label>
                                        <textarea v-model="client.adressClt" type="text" id="adressClt" name="nomClt"
                                                  placeholder="Adresse de client/Entreprise" class="form-control validate white-text"></textarea>
                                        <div style="color:red;" v-if="client.errors.has('adressClt')"
                                             v-html="client.errors.get('adressClt')"/>
                                    </div>

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Numéro du registre commercial
                                            (NRC) :</label>
                                        <input v-model="client.rc" placeholder="XX/XX.XXXXXXXXXXXX" type="number"
                                               id="rc" name="rc" class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('rc')" v-html="client.errors.get('rc')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Numéro d'identifiant fiscale
                                            : </label>
                                        <input v-model="client.nif" placeholder="XX XX XXX XXX XXX" type="number" id="nif" name="nif"
                                               class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('nif')" v-html="client.errors.get('nif')"/>
                                    </div>
                                </div>

                                <hr style="border-top: 1px solid #d3d3d7; width:40%">
                                <div class="row">

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Qualité du contact :</label>
                                        <select v-model="client.quality" placeholder=" Entreprise ou Personne"
                                                type="text" id="quality" name="nomClt"
                                                class="form-control validate white-text">
                                            <option disabled value="">Selectionner qualité</option>
                                            <option value="Entreprise">Entreprise</option>
                                            <option value="Personne">Personne</option>
                                        </select>
                                        <div style="color:red;" v-if="client.errors.has('quality')" v-html="client.errors.get('quality')"/>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Contact :</label>
                                        <input v-model="client.contact" type="text" id="contact" name="contact"
                                               placeholder="Nom et Prenom" class="form-control validate white-text">
                                        <div style="color:red;" v-if="client.errors.has('contact')" v-html="client.errors.get('contact')"/>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Annuler</button>
                            <button v-show="!tedtdt" type="submit" class="btn btn-primary">Ajouter</button>
                            <button v-show="tedtdt" type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Information-->
        <div class="modal fade" id="infotClt" tabindex="-1" aria-labelledby="infoCltLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image"
                     style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">
                    <div class="text-white rgba-stylish-strong px-5 z-depth-4">
                        <div class="modal-header text-center py-4 pb-4">
                            <h3 class="modal-title w-100 text-blue  font-weight-bold" id="myModalLabel"><strong>Details
                                de</strong>
                                <a class="text-test font-weight-bold"> <strong>Client </strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Nom : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.nomClt | upText}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Prenom :</label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.prenomClt | upText}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Date de naissance : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.dateNClt }}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Type du client : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.type | upText}} ,</label>
                                            </div>
                                    <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Raison sociale : </label>
                                    <label data-error="wrong" data-success="right" class="text-green "> {{client.raisonSociale }} ,</label>
                                    </div>
                                    <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Qualité : </label>
                                    <label data-error="wrong" data-success="right" class="text-green "> {{client.quality | upText}} </label>
                                    </div>
                                    </div>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Contact : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.contact | upText}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Désignation : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.designationClt | upText}}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Email : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.emailClt | upText}}</label>
                                <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Numéro de téléphone : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.tel}}</label>
                                <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Numéro de fax : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.fax}}</label>
                                </div>

                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Wilaya : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{wilayatest.name }}</label>
                                <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Adresse : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.adressClt | upText}}</label>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d3d3d7; width:40%">

                            <div class="row">
                                <div class="col">
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Numéro du registre commercial (NRC) : </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.rc}}</label>
                                    <br>
                                    <label data-error="wrong" data-success="right" class="text-uppercase">Numéro d'identifiant fiscale :  </label>
                                    <label data-error="wrong" data-success="right" class="text-green ">{{client.nif}}</label>
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
            wilayaname:'',
            clients: {},
            wilayas: {},
            wilayatest: {},

            client: new Form({
                id: '',
                nomClt: '',
                prenomClt: '',
                dateNClt: '',
                type: '',
                designationClt: '',
                emailClt: '',
                adressClt: '',
                tel: '',
                fax: '',
                contact: '',
                rc: '',
                nif: '',
                raisonSociale: '',
                quality: '',
                wilayas: '',
            })
        }
    },
    methods: {
        newModal() {
            if(this.$gate.isAgentTC()) {
                this.tedtdt = false;
                this.client.reset();
                $('#addNewClt').modal('show')
            }
        },

        editModal(client) {
            if(this.$gate.isAgentTC()) {
                this.tedtdt = true;
                this.client.reset();
                $('#addNewClt').modal('show')

                this.client.fill(client);
            }
        },

        showModal(client){
            if(this.$gate.isAgentTC()||this.$gate.isDirecteur()) {
                $('#infotClt').modal('show')
                this.client.fill(client);
                this.getwailay(client.wilayas)
            }
        },



        getwailay(wilayaid){
            if(this.$gate.isAgentTC()||this.$gate.isDirecteur()) {
                axios.get("api/wilayas/" + wilayaid).then(({data}) => (this.wilayatest = data));
                this.wilayaname = this.wilayatest.name
                return this.wilayatest.name
            }
        },

        loadClient() {
            if(this.$gate.isAgentTC()||this.$gate.isDirecteur()) {
                axios.get("api/client").then(({data}) => (this.clients = data));
            }
        },

        loadWilays() {
            if(this.$gate.isAgentTC() ||this.$gate.isDirecteur()){
            axios.get("api/wilayas").then(({data}) => (this.wilayas = data));
        }},

        ajoutClient() {
            if(this.$gate.isAgentTC()){
            this.$Progress.start()
            this.client.post('/api/client')
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addNewClt').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Client bien ajouté'
                    })
                    this.$Progress.finish()
                })
                .catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: ' Veuillez remplir les champs correctement'
                    })
                    this.$Progress.fail()
                })
        }},

        updateClient() {
            if(this.$gate.isAgentTC()) {
                this.$Progress.start();
                this.client.put('api/client/' + this.client.id)
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        $('#addNewClt').modal('hide')
                        Toast.fire({
                            icon: 'success',
                            title: 'Client bien modifié'
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
        deleteClient(id){
            if(this.$gate.isAgentTC()){
            Swal.fire({
                title: 'Vous ête sur ?',
                text: "Vous ne pouvez plus revvenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimer le!'
            }).then((result) => {
                if (result.value) {
                    this.client.delete('api/client/' + id)
                        .then((res) => {

                            Swal.fire(
                                'Suprimé!',
                                'client bien suprimé.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                        })
                        .catch(() => {
                            Swal.fire(
                                'Erreur!',
                                'client non suprimé!',
                                'warning'
                            )
                        })
                }
            })
        }}
    },

    created() {
        if (this.$gate.isAgentTC()||this.$gate.isDirecteur()) {
            this.loadClient();
            this.loadWilays();


            Fire.$on('AfterCreate', () => {
                this.loadClient();
                this.loadWilays();
            });

        }
    }
}
</script>
