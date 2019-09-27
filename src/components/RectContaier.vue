<template>
  <div class="ratio-container">
    <div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "RectContaier"
};
</script>

<style scoped>
  .ratio-container {
     background-color: red;
     position: relative;
     width: 100%;
     padding-top: 100%; /* 1:1 Aspect Ratio */
     overflow: hidden;
     background-color: #fff;
  }
  .ratio-container > div {
     position: absolute;
     top: 0;
     left: 0;
     bottom: 0;
     right: 0;
     text-align: center;
     font-size: 20px;
     color: white;
  }
</style>
