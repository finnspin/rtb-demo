<template>
  <div class="video-bar">
    <div>
      <VideoRow :width="800" :height="224"/>
    </div>
  </div>
</template>

<script>
import VideoRow from "./VideoRow";

export default {
  name: "VideBar",
  components: {
    VideoRow
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-bar {
    display: flex;
    justify-content: center;
    /* height: 600px;
    width: 300px; */
    /* flex-direction: column; */
  }
</style>
