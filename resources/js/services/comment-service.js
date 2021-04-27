import { api } from '../boot/axios'

export default class CommentService {

    constructor() {
        this.apiClient = api
    }

    async getAllComments() {
        return await this.apiClient.get(`/comments`)
    }

    async addNewComment(commentDetails) {
        return await this.apiClient.post(`/comments`, commentDetails)
    }
}
