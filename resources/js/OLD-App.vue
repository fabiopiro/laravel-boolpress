<template>
  <div>
    <main class="container">
      <h1>Il mio Blog</h1>
        <div class="row">
          <Card 
          v-for="post in posts"
          :key="post.id"
          :item="post"
          />




          <!-- <div
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
          </div> -->
        </div>
    </main>
  </div>
</template>

<script>
// [1] ...front.js
// [2] ...creo nuovo componente WorkInProgress
// [3] ...importo WorkInProgress 1),2),3)

// 1)
import Card from './components/Card.vue';

export default {
    name: 'App',
    // 2)
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

<style lang='scss'>

</style>

