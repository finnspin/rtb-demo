<template>
  <div class="home">
    <RectShape
      :style="{ margin: 'auto' }"
      :width="640"
      :height="400"
      :step="12"
      color="#FF4500" />
  </div>
</template>

<script>
  // @ is an alias to /src
  import RectShape from "@/components/RectShape";
  export default {
    name: 'home',
    components: {
      RectShape
    }
  }
</script>
