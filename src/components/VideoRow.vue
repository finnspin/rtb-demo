<template>
  <div class="video-row" ref="videoRow">
    <videoContainer
      v-for="video in videos"
      :key="video.id"
      :width="videoWidth"
      :height="videoHeight"
      :src="video.src" />
  </div>
</template>

<script>
import VideoContainer from "./VideoContainer";
import { Back, TimelineLite, Power2 } from "gsap/TweenMax";

export default {
  name: "VideoRow",
  components: {
    VideoContainer
  },
  props: {
    width: Number,
    height: Number
  },
  data: function() {
    return {
      videos: [
        { id: 0, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 1, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 2, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 3, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 4, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" },
        { id: 5, src: "http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" }
      ],
      videoWidth: 0,
      videoHeight: 0,
      timeline: null
    };
  },
  created: function() {
    this.timeline = new TimelineLite({ paused: true });
    // 4x2
    this.videoWidth = this.width / 4;
    this.videoHeight = this.height / 2;
  },
  mounted: function() {
    const parent = this.$refs.videoRow;
    const elements = parent.getElementsByClassName('video-container');
    const elem = elements[0];

    let offset = 0;

    if (elem)
      offset = elem.offsetWidth;

    this.timeline.addLabel("root");

    for (let i = 0; i < elements.length; i++) {
      const current = elements[i];
      // between the pop ups (in sec)
      const delay = i * 1.15;
      this.timeline.fromTo(current, 0.6,
        {
          y: this.height / 2 - this.videoHeight / 2,
          x: this.width / 2 - this.videoWidth / 2,
          scale: 0.5,
          autoAlpha: 0
        },
        {
          y: this.height / 2 - this.videoHeight / 2,
          x: this.width / 2 - this.videoWidth / 2,
          scale: 2.2,
          ease: Back.easeOut.config(2),
          autoAlpha: 1,
        },

        "root+=" + delay
      );

      let newY = 0;
      let newX = offset * i;

      const n = this.width / this.videoWidth;

      console.log(n);

      // const n = Math.ceil(elements.length / 2);

      if (i >= n) {
        newY = this.videoHeight;
        newX = offset * (i - n)
      }

      this.timeline.to(current, 0.5, {
        y: newY,
        x: newX,
        scale: 1,
        ease: Power2.easeInOut
      }, "root+=" + (delay + 1))
    }

    this.timeline.play();

  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .video-row {
    min-width: 800px;
    min-height: 224px;
    margin: auto;
    position: relative;
    background-color: orange;
  }
  .video-row > div {
    position: absolute;
    left: 0;
    top: 0;
  }
</style>
