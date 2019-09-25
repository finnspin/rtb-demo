<template>
  <div class="home">
    <VideoRow :width="800" :height="224" :cols="3" :rows="2"/>
  </div>
</template>

<script>
  // @ is an alias to /src
  import VideoRow from '@/components/VideoRow';
  export default {
    name: 'home',
    components: {
      VideoRow
    }
  }
</script>
