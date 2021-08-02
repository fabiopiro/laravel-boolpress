<template>
  <section class="my-5">
      <h1>Blog</h1>
        <div class="row">
          <Card 
          v-for="post in posts"
          :key="post.id"
          :item="post"
          />
        </div>
  </section>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    name: 'Blog',
    components: {
        Card,
    },
    data: function() {
      return {
        posts: []
      }
    },
    methods: {
      truncateText: function(string, charsNumber = 150) {
        if(string.length > charsNumber) {
          return string.substr(0, charsNumber) + '...';
        } else {
          return string;
        }
      },
      getPosts: function() {
        axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(
          res=> {
              console.log(res.data);
              this.posts = res.data;

              this.posts.forEach(
                element => {
                  // console.log(element);
                  element.excerpt = this.truncateText(element.content, 150)
              });
          }
        )
        .catch(
          err=> {
            console.log(res);
          }
        );
      }
    },
    created: function() {
      this.getPosts();
    },
}
</script>

<style>

</style>