<template>
  <header>
    <nav class="my-5">
      <ul>
        <li>
          <!-- use router-link component for navigation. -->
          <!-- specify the link by passing the `to` prop. -->
          <!-- `<router-link>` will be rendered as an `<a>` tag by default -->

          <!-- statico -->
          <!-- <router-link to="/">Home</router-link> -->

          <!-- dinamico -->
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li>
          <!-- <router-link to="/blog">Blog</router-link> -->
          <router-link :to="{ name: 'blog' }">Blog</router-link>
        </li>
        <li>
          <!-- <router-link to="/about">About</router-link> -->
          <router-link :to="{ name: 'about' }">About</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss">

    /* ACTIVE - option 1)
    a {
      &.router-link-exact-active {
        background-color: lightblue;
      }
    }
    */

    /* ACTIVE - option 2)
    ...in router.js - linkExactActiveClass: 'active',
    */
    a {
      &.active {
        background-color: lightblue;
      }
    }

</style>