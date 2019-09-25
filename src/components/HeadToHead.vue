<template>
  <div class="head-to-head">
    <slot></slot>
  </div>
</template>

<script>
import { Back, TweenMax, TimelineLite, Power2 } from "gsap/TweenMax";
export default {
  name: "HeadToHead",
  props: {
    speed: Number
  },
  mounted: function() {
    const player1 = this.$slots.default[0].elm;
    const player2 = this.$slots.default[1].elm;

    const w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

    const tl = new TimelineLite();

    tl.addLabel("move-1")
      .fromTo(player1, 0.4,
        { x: -w/2, scale: 0.9 },
        { x: 0, scale: 0.9, ease: Power2.easeInOut },
        "move-1"
      )
      .fromTo(player2, 0.4,
        { x: w/2, scale: 0.9 },
        { x: 0, scale: 0.9, ease: Power2.easeInOut },
        "move-1"
      )
      .addLabel("move-2", "+=0.0")
      .to(player1, 0.35, {
        scale: 0.9,
        x: "-=100",
        rotation: -15,
        ease: Back.easeInOut.config(1.7),
        overwrite: false
      }, "move-2")
      .to(player2, 0.35, {
        scale: 0.9,
        x: "+=100",
        rotation: 15,
        ease: Back.easeInOut.config(1.7),
        overwrite: false
      }, "move-2")
      .addLabel("move-3", "+=0.0")
      .to(player1, 0.2, { scale: 1,
        x: 10,
        scale: 1,
        rotation: 0,
        ease: Power2.easeIn,
        overwrite: false
      }, "move-3")
      .to(player2, 0.2, { scale: 1,
        x: -10,
        scale: 1,
        rotation: 0,
        ease: Power2.easeIn,
        overwrite: false
      }, "move-3")
      .addLabel("move-4", "+=0.0")
      .to(player1, 0.45, {
        scale: 1,
        x: 0,
        rotation: 0,
        ease: Power2.easeOut,
        overwrite: false
      }, "move-4")
      .to(player2, 0.45, {
        scale: 1,
        x: 0,
        rotation: 0,
        ease: Power2.easeOut,
        overwrite: false
      }, "move-4")

  }
};
</script>

<style scoped>
  .head-to-head {
    max-width: 100%;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
</style>
