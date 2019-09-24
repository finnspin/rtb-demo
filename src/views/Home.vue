<template>
  <div class="home">
    <!-- <VideoRow :width="800" :height="224" :cols="3" :rows="2"/> -->
    <RectShape :style="{ margin: 'auto' }" :width="640" :height="400" :step="12" color="#FF4500"/>
  </div>
</template>

<script>
  // @ is an alias to /src
  // import VideoRow from '@/components/VideoRow';
  import RectShape from "@/components/RectShape";

  export default {
    name: 'home',
    components: {
      // VideoRow,
      RectShape
    }
  }
</script>
