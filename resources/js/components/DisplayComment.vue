<template>
  <div class="m-2">
    <div class="space-y-4" v-if="comment">
      <div class="flex">
        <div class="flex-shrink-0 mr-3">
          <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" :src="image" />
        </div>

        <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">

          <strong>{{ comment.name }} </strong>

          <span class="text-xs text-gray-400 ml-2">{{ formatDate(comment.created_at) }}</span>

          <p class="text-xs sm:text-sm">
            {{ comment.body }}
          </p>

          <p class="cursor-pointer mt-5 text-sm text-green-500"
            @click="replyToComment = comment"
            v-show="comment.level < 3"
          >
            Reply
          </p>

          <div class="flex justify-between">

            <h4 v-show="collection[comment.id]" class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">
              Replies
            </h4>

            <p
              v-if="comment == replyToComment"
              @click="closeForm"
              class="my-5 uppercase tracking-wide text-green-500 text-xs cursor-pointer"
            >
              Close
            </p>

          </div>

          <comment-form
            v-if="comment == replyToComment"
            :parent_id="comment.id"
            :level="comment.level"
          />

          <comment-list
            v-if="collection[comment.id]"
            :comments="collection[comment.id]"
            :collection="collection"
          />

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CommentForm from '../components/CommentForm'
const moment = require('moment');

export default {
  props: ['comment', 'collection'],
  name: 'DiplayComment',
  components: {
    'comment-form': CommentForm,
  },
  data() {
    return {
      level: 1,
      image:
        'https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80',
      replyToComment: false,
    }
  },
  methods: {
    closeForm() {
      this.replyToComment = false
    },
    formatDate(date) {
      return moment(date).format('MMMM Do YYYY, h:mm:ss a');
    }
  },
}
</script>
