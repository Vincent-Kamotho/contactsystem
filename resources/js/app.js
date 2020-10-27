window.Vue = require('vue');
require('./bootstrap');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-contact', require('./components/addContact.vue').default);
Vue.component('edit-contact', require('./components/editContact.vue').default);
Vue.component('all-contacts', require('./components/allContacts.vue').default);


const app = new Vue({
    el: "#app"
});
