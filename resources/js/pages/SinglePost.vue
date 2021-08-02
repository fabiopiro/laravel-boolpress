<template>
  <section class="my-5">
      <h1>{{ post.title }}</h1>
      <p class="my-5"> {{ post.content }}</p>
      <router-link class="btn btn-primary" :to="{ name: 'blog' }">
          Torna al Blog
      </router-link>
  </section>
</template>

<script>
export default {
    name: 'SinglePost',
    data: function () {
        return {
            post: null
        }
    },
    created: function () {

        // Router... - Show Post
        // 1) api.php
        // 2) Api/PostController.php
        // 3) methods - axios - getPost(slug)
            // data
        // 4) created - getPost
        // 5) HTML {{ post.title }} {{ post.content }}...
        this.getPost(this.$route.params.slug);
        console.log(this.$route.params.slug);

    },
    methods: {
        getPost: function (slug) {
            axios
            .get(`http://127.0.0.1:8000/api/posts/${slug}`)
            .then(
                res => {
                    // console.log(res.data);
                    this.post = res.data;
                }
            )
            .catch(
                err => {
                    console.log(err);
                }
            );
        }
    }
}
</script>

<style>

</style>