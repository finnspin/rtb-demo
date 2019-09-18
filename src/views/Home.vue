<template>
  <div class="home">
    <div class="row">
      <div class="col">
        <VideoBar />
      </div>
      <div class="col">
        <VideoBar class="float-right" />
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import VideoBar from '@/components/VideoBar';
export default {
  name: 'home',
  components: {
    VideoBar
  }
}
</script>

<style >
</style>
