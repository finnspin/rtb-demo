<template>
  <div class="video-bar">
    <div>
      <VideoColumn />
    </div>
  </div>
</template>

<script>
import VideoColumn from "./VideoColumn";

export default {
  name: "VideBar",
  components: {
    VideoColumn
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-bar {
    display: flex;
    justify-content: center;
    height: 600px;
    width: 300px;
    flex-direction: column;
  }
</style>
