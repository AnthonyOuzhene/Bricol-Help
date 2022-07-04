import axios from 'axios';

import { baseUrl } from './apiClientService';

const endpoint = '/wp/v2/tutorials';

export default {

    getTutorials() {
        // axios.get()retourne une Promise
        return axios.get(baseUrl + endpoint + '?_embed');
    },

     // récupérer les données d'un tuto par son id
     getSingleTutorial(tutorielId) {
        return axios.get(baseUrl + endpoint + '/' + tutorielId + '?_embed');
    },

    getTutorialsByCategoryType(tutoListByCategory) {
 
        let queryString = '&category_types[terms]=' + tutoListByCategory + '&category_types[operator]=AND'

        return axios.get(baseUrl + endpoint + '?_embed' + queryString);
    },

    createTutorial(tutorialData) {
        
        return axios.post(baseUrl + endpoint, tutorialData,
            {headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}}
        );
    }
}