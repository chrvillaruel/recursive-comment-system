

import CommentService from '../services/comment-service'
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    comments: [],
  },
  mutations: {
    SET_COMMENTS(state, comments) {
      state.comments = comments
    },
  },
  actions: {
    async getAllComments({ commit }) {

      const commentService = new CommentService()

      return await commentService.getAllComments()
                  .then(({ data }) => {
                    commit('SET_COMMENTS', data.comments)
                  })
    },
    async addNewComment({ dispatch }, commentDetails) {

      const commentService = new CommentService()

      return await commentService.addNewComment(commentDetails)
                  .then(({ data }) => {
                    dispatch('getAllComments')
                  })
    },
  },
  getters: {
    getComments: (state) => {
      return state.comments
    },
  },
})

export { store }
