<template>
  <div class="game-container">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "GameContainer",
  props: {}
};
</script>
<style scoped>
  .game-container {
    background-color: #fff;
    border-radius: 5px;
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    min-width: 600px;
    min-height: 300px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  }
</style>
