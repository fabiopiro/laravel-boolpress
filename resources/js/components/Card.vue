<template>
        <div
          class="col-4 my-3 d-flex">
            <div class="card w-100">
              <div class="card-body">
                <h3>{{ item.title }}</h3>
                <p>{{ item.excerpt }}</p>
                <!-- <a href="" class="card-link">Leggi</a> -->

                <router-link :to="{ name: 'single-post', params: { slug:item.slug } }">Leggi</router-link>
              </div>
            </div>
        </div>
</template>

<script>
export default {
    name: 'Card',
    props: { 'item' : Object}
}
</script>

<style>

</style>