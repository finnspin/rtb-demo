<template>
  <div class="
    stack-container
    d-flex
    flex-wrap">
    <slot :class="col"></slot>
  </div>
</template>

<script>
export default {
  name: "StackContainer",
};
</script>

<style scoped>
  .stack-container {

  }
</style>
