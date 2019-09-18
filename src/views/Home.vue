<template>
  <div class="home">
    <VideoRow :width="800" :height="224"/>
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
