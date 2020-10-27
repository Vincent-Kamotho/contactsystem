<template>
    <div>
        <h3 class="text-center">All Contacts</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Names</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.id }}</td>
                <td>{{ contact.fullname }}</td>
                <td>{{ contact.phone }}</td>
                <td>{{ contact.email }}</td>
                <td>
                    <div class="btn-group" role="group">
                    <button style= "border-radius:5px;"class="btn btn-success" @click="showUpdateModal(contact)">Edit</button>
                    <button style= "margin-left:15px; border-radius:5px;" class="btn btn-danger" @click="deleteContact(contact.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contact Edit Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateContact()" class="myform" >
                            <input type="hidden" name="contactid" v-model="actionContact.id">
                            <div class="form-group">
                                <label for="names">Full Names</label>
                                <input type="text" class="form-control" name="names" v-model="actionContact.fullname" id="names" >
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" v-model="actionContact.phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" v-model="actionContact.email" id="email" >
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" >Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contacts: [],
                actionContact: { }
            }
        },
        created() {
            this.fetchContacts()
        },


        methods: {


            fetchContacts() {
                axios
                    .get('api/contacts')
                    .then(response => {
                        this.contacts = response.data.data;
                        console.log(this.contacts);
                    });
            },

            deleteContact(id){
                axios
                    .post('deletecontact', {id})
                    .then(response => {
                        alert(response.data.Message)
                        this.fetchContacts()
                    })
                    .catch(error => {
                        console.log(error)
                        alert("Failed to delete contact");
                    })
                    .finally(() => this.loading = false)
            },


            showUpdateModal(contact){
              this.actionContact = JSON.parse(JSON.stringify(contact));
              $("#exampleModal").modal('show');
            },

            updateContact(){
                let postData = new FormData($('.myform')[0]);
                axios
                    .post('contactedit', postData)
                    .then(response => {
                        alert(response.data.Message)
                        this.fetchContacts()
                        $("#exampleModal").modal('hide');
                    })
                    .catch(error => {
                        console.log(error)
                        alert("Failed to update contact");
                    })
                    .finally(() => this.loading = false)
            },

        },

        mounted(){
            //this.viewContact();
        },


    }
</script>
