<template>
  <div class="video-container" ref="videoContainer">
    <!-- There is a bug with get video tag height in JS -->
    <!-- so it must be declared explicitly -->
    <video width="200px" height="112px" autoplay muted loop>
      <source :src="src" type="video/webm">
        Sorry, your browser doesn't support embedded videos.
    </video>
  </div>
</template>

<script>
import { Power2, TweenMax } from "gsap/TweenMax";
export default {
  name: "VideoContainer",
  props: {
    src: String
  },
  mounted: function() {
    TweenMax.from(this.$refs.videoContainer, 0.5, {
      scale: 0.5,
      autoAlpha: 0,
      ease: Power2.easeInOut
    });
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-container {
    position: relative;
    padding: 2px;
  }
  .video-container video {
    display: flex;
  }
</style>
