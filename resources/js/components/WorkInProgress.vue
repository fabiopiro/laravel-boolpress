<template>
  <div class="text-center my-5">
      <!-- Props 1),2) -->
      <!-- 1) -->
      <h1>{{ title }}</h1>
      <h2>{{ subtitle }}</h2>
  </div>
</template>

<script>
export default {
    name: 'WorkInProgress',
    props: [
        // 2)
        'title',
        'subtitle',
    ]
}
</script>

<style lang='scss' scoped>
    h1 {
        font-weight: 700;
    }
</style>