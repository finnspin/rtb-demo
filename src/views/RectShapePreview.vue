<template>
  <div class="home">
    <RectShape
      :style="{ margin: 'auto' }"
      :width="640"
      :height="400"
      :step="12"
      color="#FF4500" >

      <VideoContainer
        :width="544"
        :height="304"
        src="http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" />

    </RectShape>
  </div>
</template>

<script>
  // @ is an alias to /src
  import RectShape from "@/components/RectShape";
  import VideoContainer from '@/components/VideoContainer';
  export default {
    name: 'RectShapePreview',
    components: {
      RectShape,
      VideoContainer
    }
  }
</script>
