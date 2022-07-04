import axios from 'axios';

import { baseUrl } from './apiClientService';

const endpoint = '/wp/v2/category_types';

export default {

    getCategoryTypes() {
        // axios.get()retourne une Promise
        return axios.get(baseUrl + endpoint);
    },

    // récupérer les données d'un tuto par son id
    getSingleCategoryType(categoryTypeId) {
        return axios.get(baseUrl + endpoint + '/' + categoryTypeId);
    },

    createCategoryTypes(categoryTypes) {

        return axios.post(baseUrl + endpoint, categoryTypes,
            { headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') } }
        );
    }
}