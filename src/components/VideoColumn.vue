<template>
  <div class="video-column" ref="videoColumn">
    <VideoWrapper
      v-for="video in videos"
      :key="video.id"
      :src="video.src"
      ref="video" />
  </div>

</template>

<script>
import VideoWrapper from "./VideoWrapper";
import {Back, TimelineLite} from "gsap/TweenMax";

export default {
  name: "VideoColumn",
  components: {
    VideoWrapper
  },
  data: function() {
    return {
      videos: [
        { id: 0, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 1, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 2, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 3, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" }
      ],
      columnHeight: 0,
      videoHeight: 0,
      timeline: null
    };
  },
  methods: {
    setColumnHeight() {
      this.columnHeight = this.$refs.videoColumn.clientHeight;
    },
    start() {
      this.timeline.play();
    }
  },
  created: function () {
    console.log('created');
    this.timeline = new TimelineLite({ paused: true });
  },
  mounted: function () {
    this.setColumnHeight();
    const elements = this.$refs.videoColumn.getElementsByClassName('video-wrapper');
    this.timeline.addLabel("root");
    const DURATION = 0.8;
    const DELAY = 0.15;
    for (let i = 0; i < elements.length; i++) {
      const element = elements[i];
      this.timeline.from(element, DURATION, { y: 0, autoAlpha: 0, scale: 0.5 }, "root+=" + i*DELAY);
    }
    this.timeline.from(this.$refs.videoColumn, DELAY * elements.length, { y: this.columnHeight/2 }, "root");
    this.start();
  },
  updated: function () {
    console.log('updated')
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-column {
    max-width: 200px;
    max-height: 800px;
    /* background-color: #f44336; */
  }
</style>
