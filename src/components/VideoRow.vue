<template>
  <div :style="{ width: width + 'px', height: height + 'px'}" class="video-row" ref="videoRow">
    <Container1x1
      :style="{
        width: width/6 - 15 + 'px'
      }"
      v-for="video in videos"
      :color="color"
      :key="video.id" >
      <VideoContainer
        :width="videoWidth"
        :height="videoHeight"
        :src="video.src" />
    </Container1x1>
  </div>
</template>

<script>
import VideoContainer from "./VideoContainer";
import Container1x1 from "./Container1x1";
import { Back, TimelineLite, Power2 } from "gsap/TweenMax";

export default {
  name: "VideoRow",
  components: {
    VideoContainer,
    Container1x1
  },
  props: {
    width: Number,
    height: Number,
    cols: Number,
    rows: Number,
    delay: Number,
    color: String
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
    console.log(this);
    console.log(this.cols);

    this.videoWidth = this.width / this.cols;
    this.videoHeight = this.height / this.rows;
  },
  mounted: function() {
    const parent = this.$refs.videoRow;
    const elements = parent.getElementsByClassName('container-1x1-parent');
    const elem = elements[0];

    let offset = 0;

    if (elem)
      offset = elem.offsetWidth;

    // define starting point
    this.timeline.addLabel("root");

    let countRow = 0;
    let countCol = 0;

    for (let i = 0; i < elements.length; i++) {
      const current = elements[i];
      // delay between the pop ups (in sec)
      const delay = i * (0.6 + (-i * 0.005));
      this.timeline.fromTo(current, (0.6 + (-i * 0.05)),
        {
          y: this.height / 2 - this.videoHeight / 2,
          x: this.width / 2 - this.videoWidth / 2,
          scale: 0.5,
          autoAlpha: 0
        },
        {
          y: this.height / 2 - this.videoHeight / 2,
          x: this.width / 2 - this.videoWidth / 2,
          scale: 1.5,
          ease: Back.easeOut.config(2),
          autoAlpha: 1,
        },

        "root+=" + delay
      );

      if (countCol == this.cols) {
        countCol = 0;
        countRow++;
      }

      let newX = offset * countCol++;
      let newY = this.videoHeight * countRow;

      this.timeline.to(current, 0.5 + (-i * 0.04), {
        y: newY,
        x: newX + 15 * i,
        scale: 1,
        ease: Power2.easeInOut
      }, "root+=" + (delay + 0.5 + (-i * 0.07)));
    }

    setTimeout(() => {
      // start the animation
      this.timeline.play();
    }, this.delay * 1000);


  }
};
</script>

<style scoped>
  .name {
    color: #fff;
  }
  .rounded > div {
    pointer-events: none;
  }
  .video-row {
    margin: auto;
    position: relative;
  }
  .video-row > div {
    /* we use absolute over normal flow to move */
    /* the elements to thier own layers which should save */
    /* some resources */
    position: absolute;
    left: 0;
    top: 0;
  }
</style>
