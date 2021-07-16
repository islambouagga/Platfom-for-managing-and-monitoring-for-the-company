<template>
    <div class="container mt-12">
        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-uppercase"
                        style="margin-bottom: 30px; font-weight: 800; font-size: 20px; color: #DE6262;"> Users </h2>
                    <div class="card-tools">
                        <button class="btn btn-success" @click="newModal()" v-if="$gate.isAdmin() ">
                            <i class="fa fa-user-plus fa-fw"></i></button>
                    </div>
                </div>
                <!-- /.table____________________________________________________- -->
                <div class="card-body">
                    <div class="container">
                        <p> Chercher par Nom, Prenom, Numero de Telephone ou Emails:</p>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <div style ="border-style: double;">
                        <table class="table table-bordered table-striped" style="border-style: outset;" >
                            <thead style="background-color:#bacee2;">
                            <tr >
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <tr>
                                <td colspan="7" ><h5> <strong> Liste des Directeurs</strong> </h5></td>
                            </tr>
                            <tr v-for="user in users" :key="user.id"  v-if="user.usertable_type ==='Directeur'">
                                <th scope="row">{{ user.id }}</th>
                                <td>{{ user.nomUtilis }}</td>
                                <td>{{ user.prenomUtilis }}</td>
                                <td>{{ user.tel }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.usertable_type }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(user)">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-primary" @click="editModal(user)">
                                            <i class="fa fa-edit "></i></button>&nbsp;
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" ><h5> <strong> Liste des Agents technico commercial</strong> </h5></td>

                            </tr>
                            <tr v-for="user in users" :key="user.id" v-if="user.usertable_type ==='AgentTC'">
                                <th scope="row">{{ user.id }}</th>
                                <td>{{ user.nomUtilis }}</td>
                                <td>{{ user.prenomUtilis }}</td>
                                <td>{{ user.tel }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.usertable_type }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(user)">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-primary" @click="editModal(user)">
                                            <i class="fa fa-edit "></i></button>&nbsp;
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" ><h5> <strong> Liste des Chargés des Projets</strong> </h5></td>
                            </tr>
                            <tr v-for="user in users" :key="user.id" v-if="user.usertable_type ==='ChargePrj'">
                                <th scope="row">{{ user.id }}</th>
                                <td>{{ user.nomUtilis }}</td>
                                <td>{{ user.prenomUtilis }}</td>
                                <td>{{ user.tel }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.usertable_type }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(user)">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-primary" @click="editModal(user)">
                                            <i class="fa fa-edit "></i></button>&nbsp;

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7"><h5> <strong>Liste des Intervenants</strong> </h5></td>
                            </tr>
                            <tr v-for="user in users" :key="user.id" v-if="user.usertable_type ==='Intervenant'">
                                <th scope="row">{{ user.id }}</th>
                                <td>{{ user.nomUtilis }}</td>
                                <td>{{ user.prenomUtilis }}</td>
                                <td>{{ user.tel }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.usertable_type }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-secondary" @click="showModal(user)">
                                            <i class="fa fa-file-alt "></i></button>&nbsp;
                                        <button class="btn btn-primary" @click="editModal(user)">
                                            <i class="fa fa-edit "></i></button>
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
        </div>


        <!-- Modal add and edit -->
        <div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image"
                     style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent=" tedtdt ? updateUser() : ajoutUser()">
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

                            <div v-show="!tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold" id="addNewUserLabel"><strong>Ajouter</strong>
                                    <a class="text-test font-weight-bold"> <strong>Chargé de Projet </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div v-show="tedtdt" class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold"><strong>Modifier</strong>
                                    <a class="text-test font-weight-bold"> <strong> utilisateur </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body text-uppercase">

                                <div class="row">
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right"   >Nom</label>
                                        <input v-model="user.nomUtilis" placeholder="Nom de l'user" type="text" id="nomUtilis" name="nomUtilis"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="user.errors.has('nomUtilis')" v-html="user.errors.get('nomUtilis')" />
                                    </div>
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right"   >Prénom</label>
                                        <input v-model="user.prenomUtilis" placeholder="Prénom de l'user" type="text" id="prenomUtilis" name="prenomUtilis"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="user.errors.has('prenomUtilis')" v-html="user.errors.get('prenomUtilis')" />
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Date de naissance</label>
                                        <input v-model="user.dateNUtilis" placeholder="01/01/1990" type="date" id="dateNUtilis" name="dateNUtilis"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="user.errors.has('dateNUtilis')" v-html="user.errors.get('dateNUtilis')" />
                                    </div>

                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">
                                <div class="row">
                                    <div class="col-mb-4">
                                        <div class="col">
                                            <label data-error="wrong" data-success="right">E-mail</label>
                                            <input v-model="user.email" placeholder="ex:Email@Gmail.com" type="email" id="email" name="email"  class="form-control validate white-text">
                                            <div style="color:red;" v-if="user.errors.has('email')" v-html="user.errors.get('email')" />
                                        </div><br>

                                        <div class="col">
                                            <label data-error="wrong" data-success="right"   >Numéro de téléphone</label>
                                            <input v-model="user.tel" placeholder="Mobile de l'user" type="number" id="tel" name="tel"  class="form-control validate white-text">
                                            <div style="color:red;" v-if="user.errors.has('tel')" v-html="user.errors.get('tel')" />
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label data-error="wrong" data-success="right"   >Adresse</label>
                                        <textarea v-model="user.adressUtilis"placeholder="Adresse de l'user" type="text" id="adressUtilis" name="adressUtilis"  class="form-control validate white-text"></textarea>
                                        <div style="color:red;" v-if="user.errors.has('adressUtilis')" v-html="user.errors.get('adressUtilis')" />
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">
                                <div class="row">

                                    <div class="col">
                                        <label data-error="wrong" data-success="right">Mot de passe</label>
                                        <input v-model="user.password" placeholder="Mot de passe" type="password" id="password" name="password"  class="form-control validate white-text">
                                        <div style="color:red;" v-if="user.errors.has('password')" v-html="user.errors.get('password')" />
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
        <div class="modal fade" id="infoUser" tabindex="-1" aria-labelledby="infoUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg form-dark" role="document">
                <div class="modal-content card card-image" style="background: url('img/imgAcceuil/1.svg'); background-color: #ffffff">

                    <form @submit.prevent="infoUser" >
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                            <div class="modal-header text-center pb-4">
                                <h3 class="modal-title w-100 text-blue  font-weight-bold" id="myModalLabel"><strong>Details de </strong>
                                    <a class="text-test font-weight-bold"> <strong >l'utilisateur </strong></a></h3>
                                <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body ">
                                <br>
                                <div class="row">
                                    <div class="col ">
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Nom :</label>
                                        <label data-error="wrong" data-success="right" class="text-green ">{{user.nomUtilis | upText}} </label>
                                        <br>
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Prénom :  </label>
                                        <label data-error="wrong" data-success="right" class="text-green "> {{user.prenomUtilis | upText}}</label>
                                        <br>
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Date de naissance : </label>
                                        <label data-error="wrong" data-success="right" class="text-green ">{{user.dateNUtilis | upText}} </label>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Mobile : </label>
                                        <label data-error="wrong" data-success="right" class="text-green ">{{user.tel}}</label>
                                        <br>
                                        <label data-error="wrong" data-success="right" class="text-uppercase">Email :</label>
                                        <label data-error="wrong" data-success="right" class="text-green ">{{user.email  | upText}}</label>
                                        <br>
                                        <label data-error="wrong" data-success="right" class="text-uppercase"> Adress : </label>
                                        <label data-error="wrong" data-success="right" class="text-green "> {{user.adressUtilis  | upText}} </label>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid #d3d3d7; width:40%">

                                <div class="row">
                                    <div class="col">
                                        <label data-error="wrong" data-success="right"class="text-uppercase"> Poste : </label>
                                        <label data-error="wrong" data-success="right" class="text-green "> {{user.usertable_type}}</label>
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


    </div>
</template>

<script>
import Form from "vform";

export default {
    data() {
        return {
            tedtdt: false,
            users :{},
            user: new Form({
                id:'',
                nomUtilis: '',
                prenomUtilis: '',
                email: '',
                adressUtilis: '',
                tel: '',
                usertable_type: '',
                dateNUtilis: '',
                password: '',
            })
        }
    },
    methods: {
        newModal() {
            if(this.$gate.isAdmin()) {
                this.tedtdt = false;
                this.user.reset();
                $('#addNewUser').modal('show')
            }
        },

        editModal(user) {
            if(this.$gate.isAdmin()) {
                this.tedtdt = true;
                this.user.reset();
                $('#addNewUser').modal('show')
                this.user.fill(user);
            }
        },

        showModal(user){
console.log('hfhf')
                $('#infoUser').modal('show')
                this.user.fill(user);
        },

        loadUser() {
            if(this.$gate.isAdmin()) {
                axios.get("api/users").then(({data}) => (this.users = data));
            }
        },

        ajoutUser() {
            console.log('jsdjsj')
            // if(this.$gate.isAdmin()){
                this.$Progress.start()
                this.user.post('/api/createChargerPrj')
                    .then(() => {
                        Fire.$emit('apresAjout');
                        $('#addNewUser').modal('hide')
                        Toast.fire({
                            icon: 'success',
                            title: 'Utilisateur bien ajouté'
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
            // }
            },

        updateUser() {
            console.log('45')
                this.$Progress.start();
                this.user.put('api/users/' + this.user.id)
                    .then(() => {
                        Fire.$emit('apresAjout');
                        $('#addNewUser').modal('hide')
                        Toast.fire({
                            icon: 'success',
                            title: 'Utilisateur bien modifié'
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

            },
    },

    created() {
            this.loadUser();
            Fire.$on('apresAjout',() => {
                this.loadUser();
                // this.refresh();
            });


        }
}


</script>
