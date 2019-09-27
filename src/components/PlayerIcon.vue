<template>
  <div class="player-icon">
    <img :src="src" alt="player icon" />
    <p class="name">{{ name }}</p>
  </div>
</template>

<script>
export default {
  name: "PlayerIcon",
  props: {
    src: String,
    name: String
  }
};
</script>

<style scoped>
  .player-icon {
    max-width: 200px;
    position: relative;
    max-height: 200px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid pink;
    margin: 10px;
  }
  .player-icon > img {
    max-width: 100%;
    display: block;
  }
  .name {
    width: 100%;
    position: absolute;
    bottom: 20px;
    color: #fff;
    font-weight: 700;
    font-size: 30px;
    text-shadow: 1px 1px 5px #000;
  }
</style>
