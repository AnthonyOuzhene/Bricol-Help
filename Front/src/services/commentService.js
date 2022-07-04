import axios from "axios";
import { baseUrl } from "./apiClientService";

const endpoint = "/wp/v2/comments"

export default {
    getComments(postId) {
        return axios.get(baseUrl + endpoint + '?post=' + postId);
    },
    postComment(postId,commentContent) {
        return axios.post(
            baseUrl + endpoint,
            {content: commentContent, post: postId},
            {headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')}}
        );
    }
}
