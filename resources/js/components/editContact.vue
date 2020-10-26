<template>
    <div>
        <h3 class="text-center">Edit Contactsss</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateContact">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.fullname">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="contact.phone">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control" v-model="contact.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Contact</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contact: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/contact/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.contact = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateContact() {
                this.axios
                    .post(`http://localhost:8000/api/contact/update/${this.$route.params.id}`, this.contact)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>