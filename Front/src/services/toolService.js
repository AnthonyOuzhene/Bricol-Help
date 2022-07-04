import axios from 'axios';

import { baseUrl } from './apiClientService';

const endpoint = '/wp/v2/tools/';

export default {

    getTools() {
        // axios.get()retourne une Promise
        return axios.get(baseUrl + endpoint);
    },

    createTool(toolData) {
        
        return axios.post(baseUrl + endpoint, toolData,
            {headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}}
        );
    }
}