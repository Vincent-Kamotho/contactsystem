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
                    </div>
                    <!--<router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-primary">Edit
                    </router-link>-->
                    <button class="btn btn-warning" @click="deleteContact(contact.id)">Edit</button>
                    <button class="btn btn-danger" @click="deleteContact(contact.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contacts: []
            }
        },
        created() {
            this.fetchContacts()
        },


        methods: {
            viewContact(id) {
                let instance = this;
                axios.get('api/contacts')
                .then(function(response){
                    console.log(response);
                    instance.contacts_list = response.data;
                })

                .catch(function(error)
                {
                    console.log(error);
                });
            },

            fetchContacts() {
                axios
                    .get('api/contacts')
                    .then(response => {
                        this.contacts = response.data.data;
                        console.log(this.contacts);
                    });
            },
        },
            //     this.axios
            //         .delete(`http://localhost:8000/api/book/delete/${id}`)
            //         .then(response => {
            //             let i = this.books.map(item => item.id).indexOf(id); // find index of your object
            //             this.books.splice(i, 1)
            //         });
            // }
        mounted(){
            //this.viewContact();
        }
    }
</script>
