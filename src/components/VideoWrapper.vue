<template>
  <div class="video-wrapper">
    <video autoplay muted loop width="auto">
      <source :src="src" type="video/webm">Sorry, your browser doesn't support embedded videos.
    </video>
  </div>
</template>

<script>
export default {
  name: "VideoWrapper",
  props: {
    src: String
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-wrapper {
    max-width: 100%;
    display: flex;
    padding-top: 2px;
    padding-bottom: 2px;
    padding-left: 4px;
    padding-right: 4px;
    background-color: #000;
  }
  .video-wrapper:first-child {
    padding-top: 4px;
  }
  .video-wrapper:last-child {
    padding-bottom: 4px;
  }
  .video-wrapper video {
    max-width: 100%;
  }
</style>
