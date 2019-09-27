<template>
  <div class="video-container">
    <video width="100%" height="auto" autoplay muted loop>
      <source :src="src" type="video/webm">
        Sorry, your browser doesn't support embedded videos.
    </video>
  </div>
</template>

<script>
export default {
  name: "VideoContainer",
  props: {
    src: String,
    width: Number,
    height: Number
  }
};
</script>

<style scoped>
  .video-container {
    position: relative;
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    display: flex;
    border-radius: 5px;
    overflow: hidden;
  }
  .video-container video {
    display: flex;
  }
</style>
