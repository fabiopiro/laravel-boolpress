<template>
  <!-- 3) -->
  <!-- props 'title', 'subtitle' -->
  <WorkInProgress 
  title='Work in progress...'
  subtitle='Sito in costruzione...'
  />
</template>

<script>
// [1] ...front.js
// [2] ...creo nuovo componente WorkInProgress
// [3] ...importo WorkInProgress 1),2),3)

// 1)
import WorkInProgress from './components/WorkInProgress.vue'

export default {
    name: 'App',
    // 2)
    components: {
        WorkInProgress
    }
}

</script>

<style lang='scss'>

</style>

