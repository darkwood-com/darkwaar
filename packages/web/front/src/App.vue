<template>
  <div id="app" class="h-screen w-full flex justify-center items-center bg-green-900">
    <HelloWorld/>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'

export default {
  name: 'App',
  components: {
    HelloWorld
  }
}
</script>
