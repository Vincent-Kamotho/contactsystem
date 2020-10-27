<template>
    <div>
        <h2 class="text-left" style = margin-bottom:30px;>Add Contacts Here</h2>
        <div class="row">
            <div class="col-md-6">
                <form method="post" @submit.prevent="addContact()" id="myform" name="myform">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.fullname">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="contact.phone">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="contact.email">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
        methods: {
            addContact() {
                axios
                    .post('addcontacts', this.contact)
                    .then(response => (
                        //this.$router.push({name: 'home'})
                        window.location.assign("viewRecords")
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>


