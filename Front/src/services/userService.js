// Service pour gérer l'utilisateur

import axios from 'axios';

// on récupère l'objet store
// c'est exactement le même objet store qui a été passé à VueJS par app.use() dans index.js
import store from '../store.js';

import { baseUrl } from './apiClientService';

const loginEndpoint = "/jwt-auth/v1/token";
const registerEndpoint = "/bricolhelp/v1/user";

export default {

    /**
     * Connecte un utilisateur déjà inscrit
     * @return la promesse de connexion
     */
    connectUser(credentials) {

        // on passe les credentials dans le corps de la requête => {username, password}
        const connectionPromise = axios.post(baseUrl + loginEndpoint, credentials)
            .then((response) => {

                localStorage.setItem('token', response.data.data.token);

                localStorage.setItem('firstname', response.data.data.firstName);
                localStorage.setItem('lastname', response.data.data.lastName);

                // on commit la mutation updateUserFirstname en passant le prénom réçu depuis l'API
                store.commit('updateUserFirstname', response.data.data.firstName);
                // idem pour lastName
                store.commit('updateUserLastname', response.data.data.lastName);

            })
            .catch((error) => {
                console.log(error);
            });

        // on retourne la promesse d'axios
        return connectionPromise;
    },

    /**
     * Enregistre un nouvel utilisateur
     * @return la promesse d'inscription
     */
    registerUser(userdata) {
        // userdata =>  objet à transmettre au serveur
        const registerPromise = axios.post(baseUrl + registerEndpoint, userdata);

        return registerPromise;
    },

    /**
     * Gère la déconnexion du user
     */
    disconnectUser() {

        // supprimer le token du localStorage
        localStorage.removeItem('token');
        localStorage.removeItem('username');


        // on accède au store défini sur index.js avec app.use(store) avec un import du fichier store.js
        // on déclenche la mutation updateUserStatus
        //store.commit('updateUserStatus');
        store.commit('setUserConnected');

    },

    /**
     * Vérifie si utilisateur est bien connecté
     * @return boolean
     */
    isUserConnected() {

        if (localStorage.getItem('token')) {
            return true;
        } else {
            return false;
        }
    },
}