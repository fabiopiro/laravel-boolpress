<template>
  <div>
    <div class="container">
      <Header />

      <main>
          <!-- component matched by the route will render here -->
          <router-view></router-view>
      </main>

    </div>
  </div>
</template>

<script>

import Header from './components/Header.vue';

export default {
    name: 'App',
    components: {
      Header,
    },
}

</script>

<style lang='scss'>

</style>

