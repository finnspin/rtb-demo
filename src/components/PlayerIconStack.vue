<template>
  <div class="
    stack-container
    d-flex
    flex-wrap">
    <slot></slot>
  </div>
</template>

<script>
import { Back, TweenMax, TimelineLite, Power2 } from "gsap/TweenMax";
export default {
  name: "PlayerIconStack",
  created() {
    this.tl = new TimelineLite({ paused: true });
  },
  methods: {
    play() {
      this.tl.play();
    }
  },
  props: [
    'bus'
  ],
  mounted() {
    this.players = this.$slots.default.map(({ elm }) => elm);
    this.tl.staggerFrom(this.players, 0.5, {
      scale: 0.5,
      alpha: 0,
      ease: Back.easeOut.config(2),
    }, 0.2);
    this.bus.$on('play', this.play)
  }
};
</script>

<style scoped>
  .stack-container {

  }
</style>
