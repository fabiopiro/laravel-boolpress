<template>
  <div>
    <main class="container">
      <h1>Il mio Blog</h1>
        <div class="row">
          <div
          class="col-4 my-3 d-flex"
          v-for="post in posts"
          :key="post.id"
          >
          <div class="card w-100">
            <div class="card-body">
              <h3>{{ post.title }}</h3>
              <p>{{ truncateText(post.content) }}</p>
              <a href="#" class="card-link">Leggi</a>
            </div>
          </div>
          </div>
        </div>
    </main>
  </div>
</template>

<script>
// [1] ...front.js
// [2] ...creo nuovo componente WorkInProgress
// [3] ...importo WorkInProgress 1),2),3)

// 1)

export default {
    name: 'App',
    // 2)
    // components: {
    // },
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
    },
    created: function() {
      axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(
          res=> {
              console.log(res.data);
              this.posts = res.data;
          }
        )
        .catch(
          err=> {
            console.log(res);
          }
        );
    },
}

</script>

<style lang='scss'>

</style>

