<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <sect />
    
  </div>
</template>

<script>
import sect from './components/layouts/section';

export default {
  name: 'app',
  components:{
    sect
  }
}
</script>

<style >
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>
