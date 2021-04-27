<template>
    <div class="container w-full md:max-w-5xl mx-auto pt-5">
     <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal">
        <!--Title-->
        <div class="font-sans">
          <h1
              class="font-bold font-sans text-gray-900 pt-6 pb-2 text-3xl md:text-4xl"
          >
              Chan Blog post
          </h1>

          <p class="text-sm md:text-base font-normal text-gray-600 mt-3 mb-5">
              Published 28 April 2021 by <a href="#" class="text-green-500"> Christian Villaruel </a>
          </p>
        </div>

        <p class="py-6">
         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
        </p>
      </div>

     <comment-form :parent_id="null" :level="0"/>

      <comment-list
        v-if="getComments"
        :comments="getComments['root_node']"
        :collection="getComments"
      />

  </div>

</template>

<script>
    import CommentForm from '../components/CommentForm'
    import { mapGetters } from 'vuex'
    export default {
        components: {'comment-form': CommentForm},
        mounted() {
          this.$store.dispatch('getAllComments');
        },
        computed: {
          ...mapGetters(['getComments']),
        },
    }
</script>
