<template>
  <div class="player-icon">
    <slot name="name-top"></slot>
    <div class="circled"
      :style="{
        borderColor: color || 'transparent'
      }">
      <RectContaier>
        <div class="player-image">
        </div>
      </RectContaier>
    </div>
    <slot name="name-bottom"></slot>
  </div>
</template>

<script>
import RectContaier from '@/components/RectContaier.vue';
export default {
  name: "PlayerIcon",
  props: {
    name: String,
    url: String,
    color: String
  },
  components: {
    RectContaier
  },
  mounted() {
    console.log(this.color);
  }
};
</script>
<style scoped>
  .player-icon {
    position: relative;
    min-width: 100px;
    max-width: 200px;
  }
  .circled {
    overflow: hidden;
    border-radius: 50%;
    border: 2px solid #9c27b0;
  }
  .player-image {
    background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmF-jcCEBwxfQePy-TsRuSc_-kZCfZD-B7X0AaS78C9jmIroQHHw);
    width: 100%;
    height: 100%;
    background-size: contain;
  }
</style>
