import axios from 'axios';

import { baseUrl } from './apiClientService';

const endpoint = '/wp/v2/materials/';

export default {

    getMaterials() {
        // axios.get()retourne une Promise
        return axios.get(baseUrl + endpoint);
    },

    createMaterial(materialData) {
        
        return axios.post(baseUrl + endpoint, materialData,
            {headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}}
        );
    }
}