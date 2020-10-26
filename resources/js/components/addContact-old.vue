<template>
    <div>
        <h3 class="text-center">Add Contacting</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit="" >
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.fullnames">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="contact.phone">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="contact.email">
                    </div>
                    <div class="form-group">

                        <input type="file" name="image" id="image1" >
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

                this.axios
                    .post('http://localhost:8000/api/contact/add', this.contact)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>

<script>
export default {
    name: "AddContact",

    data () {
        return {
            contact : [],
        }
    },

    methodis : {
        AddContact() {
            var formData = new FormData(document.getElementById("myForm"));
            let instance = this;
            axios.post('api/addContact', formData)
                .then(function (response) {
                    console.log(formData);
                    instance.$router.push("/contacts");
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },

    methods: {
        AddContact() {
            let instance = this;
            axios.get('api/addContact', formData)
                .then(function(response){
                    console.log(response);
                    instance.contacts_list = response.data;
                })

                .catch(function(error)
                {
                    console.log(error);
                });
        },

        AddContacts() {
            axios
                .get('api/addContact')
                .then(response => {
                    this.contacts = response.data.data;
                    console.log(this.contacts);
                });
        },
    },
}
</script>
