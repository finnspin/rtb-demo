<template>
  <div class="video-container">
    <video :width="width + 'px'" :height="height + 'px'" autoplay muted loop>
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
  }
  .video-container video {
    display: flex;
  }
</style>
