<template>
  <div class="video-column" ref="videoColumn">
    <videoContainer
      v-for="video in videos"
      :key="video.id"
      :src="video.src" />
  </div>
</template>

<script>
import VideoContainer from "./VideoContainer";
import { Power2, TweenMax } from "gsap/TweenMax";

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

export default {
  name: "VideoColumn",
  components: {
    VideoContainer
  },
  data: function() {
    return {
      videos: []
    };
  },
  methods: {
    getData() {
      // mimic incoming objects that describe video streams
      const that = this;
      for (let i = 0; i < getRandomInt(2, 5); i++) {
        setTimeout(() => {
          that.videos.push(
            { id: i, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" }
          );
        }, getRandomInt(500, 3500));
      }
    }
  },
  updated: function() {
    console.log("updated");
    this.$nextTick(function () {
      // Code that will run only after the
      // entire view has been re-rendered
      const parent = this.$refs.videoColumn;
      const elements = parent.getElementsByClassName('video-container');
      const elem = elements[0];
      let offset = 0;

      if (elem)
        offset = elem.offsetHeight;

      const newHeight = offset * elements.length;

      TweenMax.to(parent, 0.5, { height: newHeight, overwrite: true, ease: Power2.easeInOut });
    });
  },
  mounted: function() {
    this.getData();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-column {
    display: inline-block;
    position: relative;
    background-color: orange;
    padding-top: 2px;
    padding-bottom: 2px;
    box-sizing: unset;
  }
</style>
