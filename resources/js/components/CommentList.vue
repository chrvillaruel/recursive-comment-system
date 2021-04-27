<template>
  <div>
    <display-comment
      v-for="comment in comments"
      :comment="comment"
      :collection="collection"
      :key="comment.id"
    >
    </display-comment>
  </div>
</template>

<script>
import DiplayComment from '../components/DisplayComment.vue'
export default {
  props: ['comments', 'collection', 'level'],
  name: 'CommentList',
  components: { 'display-comment': DiplayComment },
}
</script>
