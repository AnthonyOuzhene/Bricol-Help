import { createStore } from 'vuex';
import userService from './services/userService';

// Create a new store instance.
const store = createStore({
    // ces données sont accessibles dans notre application
    state() {
        return {
            isUserConnected: false,
            firstname: "",
            lastname: "",
        }
    },

    mutations: {
        // on crée une mutation à déclencher lorsque le statut de connexion change
        updateUserStatus(state) {
            // on affecte le status de connexion à la donnée isUserConnected dans le state
            state.isUserConnected = userService.isUserConnected();
        },
        setUserConnected(state, newValue) {
            state.isUserConnected = newValue;
        },
        updateUserFirstname(state, firstname) {
            state.firstname = firstname || localStorage.getItem("firstname");
        },
        updateUserLastname(state, lastname) {
            state.lastname = lastname || localStorage.getItem("lastname");
        }
    },
})

export default store;
