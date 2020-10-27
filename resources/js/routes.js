import AllContacts from './components/AllContacts.vue';
import AddContact from './components/addContact.vue';
import EditContact from './components/EditContact.vue';
import addContact from "./components/addContact";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllContacts
    },
    {
        name: 'add',
        path: '/add',
        component: AddContact
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditContact
    },

    {
        path:"/contacts",
        component:ViewContact
    },

    {
        path:"/contacts",
        component:addContact
    }
];
