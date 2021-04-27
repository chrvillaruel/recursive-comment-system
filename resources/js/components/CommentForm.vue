<template>
  <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal">
    <form @submit.prevent="addComment()">
      <h3 class="py-2">Add Comments</h3>

      <div class="mb-3 pt-0">
        <input
          v-model="name"
          type="text"
          placeholder="Name"
          class="px-3 py-3 w-full placeholder-blueGray-300 text-lightBlue-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring"
          required
        />
      </div>

      <div class="mb-3 pt-0">
        <textarea
          v-model="body"
          placeholder="What are your thoughts?"
          class="w-full px-3 py-3 placeholder-blueGray-300 text-lightBlue-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring"
          required
        />
      </div>

      <button
        class="bg-green-500 py-1 px-1 text-white w-full mb-10"
        type="submit"
      >
        Submit
      </button>
    </form>
  </div>
</template>

<script>


export default {
  props: ['parent_id', 'level'],
  data() {
    return {
      name: '',
      body: '',
    }
  },
  methods: {
    addComment() {
      let newComment = {
        name: this.name,
        body: this.body,
        parent_id: this.parent_id,
        level: this.level + 1,
      }

      this.$store.dispatch('addNewComment', newComment)
      .then(() => {
        this.name = ''
        this.body = ''
      })
    },
  },
}
</script>
