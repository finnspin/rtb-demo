<template>
  <div class="rect" :style="{ width: width + 'px', height: height + 'px'}">
    <canvas :width="width" :height="height" ref="canvas" />
    <div class="rect-container">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { TweenMax, Power0 } from "gsap/TweenMax";

const getRandomInt = (min, max) => {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

class Point {
  constructor(x, y) {
    this.initX = x;
    this.initY = y;
    this.x = x;
    this.y = y;
  }
  random(n) {
    const newX = this.initX + getRandomInt(-n, n);
    const newY = this.initY + getRandomInt(-n, n);
    return { x: newX, y: newY };
  }
  static distance(a, b) {
    const dx = a.x - b.x;
    const dy = a.y - b.y;
    const dist = Math.sqrt( dx*dx + dy*dy );
    return dist;
  }
}

export default {
  name: "RectShape",
  props: {
    height: Number,
    width: Number,
    color: String,
    step: Number
  },
  computed: {
    ctx: function() {
      return this.$refs.canvas.getContext("2d", {
        alpha: true
      });
    }
  },
  methods: {
    start() {
      this.points.forEach(point => this.move(point));
    },
    move(point) {
      // to calc relative speed
      const newPoint = point.random(this.step);
      const dist = Point.distance(point, newPoint);
      const duration = dist * 0.1;

      TweenMax.to(point, duration, {
        x: newPoint.x,
        y: newPoint.y,
        ease: Power0.easeNone,
        onComplete: () => this.move(point)
      });
    },
    onUpdate: function() {

      const ctx = this.ctx;
      const step = this.step;
      const p1 = this.point1;
      const p2 = this.point2;
      const p3 = this.point3;
      const p4 = this.point4;

      ctx.clearRect(0, 0, this.width, this.height);

      ctx.beginPath();
      ctx.moveTo(p4.x + step, p4.y + step);

      ctx.lineTo(p1.x - step, p1.y + step);
      ctx.lineTo(p2.x - step, p2.y - step);
      ctx.lineTo(p3.x + step, p3.y - step);
      ctx.lineTo(p4.x + step, p4.y + step);

      ctx.fillStyle = this.color;
      ctx.fill();
    }
  },
  created: function() {
    this.point1 = new Point(this.width, 0, this.step);
    this.point2 = new Point(this.width, this.height, this.step);
    this.point3 = new Point(0, this.height, this.step);
    this.point4 = new Point(0, 0, this.step);

    this.points = [];
    this.points.push(this.point1);
    this.points.push(this.point2);
    this.points.push(this.point3);
    this.points.push(this.point4);
  },
  mounted: function() {
    TweenMax.ticker.addEventListener("tick", this.onUpdate);
    this.start();
  }
};
</script>

<style scoped>
  .rect {
    position: relative;
  }
  .video-container {
    position: absolute;
  }
  .rect-container {
    top: 0;
    left: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
