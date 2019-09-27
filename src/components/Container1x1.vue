<template>
  <div class="container-1x1-parent">
    <div class="name">Name</div>
    <div class="container-1x1 rounded"
      :style="{
        border: 'solid 3px' + (color || '#fff')
      }" >
      <div>
        <div>
         <slot>

         </slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Container1x1",
  props: {
    src: String,
    name: String,
    color: String
  }
};
</script>

<style scoped>
  .name {
    position: absolute;
    width: 100%;
    text-align: center;
    top: -20px;
    color: #fff;
    font-size: 12px;
  }
  .container-1x1 > div {
     background-color: red;
     position: relative;
     width: 100%;
     padding-top: 100%; /* 1:1 Aspect Ratio */
     overflow: hidden;
     background-color: #fff;
  }
  .rounded {
    border-radius: 50%;
    overflow: hidden;
  }
  .container-1x1 > div > div {
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
