<template>
  <div class="game-main">
    <div class="row">
    </div>
    <div class="row row-current-team">
      <VideoRow :width="700" :height="120" :cols="6" :rows="1"  :delay="1.0" color="#26bfa7"/>
    </div>
    <div class="row host-row">
      <HeadToHead>
        <PlayerIcon
          v-for="player in players"
          :key="player.name"
          :src="player.src"
          :name="player.name">
        </PlayerIcon>
      </HeadToHead>
    </div>
    <div class="row row-two-teams">
      <div class="col">
        <VideoRow :width="380" :height="224" :cols="6" :rows="1" :delay="0.0" color="#731493"/>
      </div>
      <div class="col">
        <VideoRow :width="380" :height="224" :cols="6" :rows="1" :delay="0.0" color="#ce2a28"/>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import VideoContainer from "@/components/VideoContainer";
import VideoRow from "@/components/VideoRow";
import HeadToHead from "@/components/HeadToHead";
import PlayerIcon from "@/components/PlayerIcon";
export default {
  name: 'Home',
  components: {
    VideoContainer,
    VideoRow,
    HeadToHead,
    PlayerIcon
  },
  data() {
    return {
      players: [
        {
          src: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmF-jcCEBwxfQePy-TsRuSc_-kZCfZD-B7X0AaS78C9jmIroQHHw",
          name: "Dmitriy"
        },
        {
          src: "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/44a738cb-a15e-431d-8b89-6571d03a4eeb/dcv6b85-2a10addc-2405-4bdc-9f88-ea6ec5b59fa9.jpg/v1/fill/w_900,h_900,q_75,strp/mortal_kombat_scorpion_icon__my_edit__by_memy9909haters_dcv6b85-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9OTAwIiwicGF0aCI6IlwvZlwvNDRhNzM4Y2ItYTE1ZS00MzFkLThiODktNjU3MWQwM2E0ZWViXC9kY3Y2Yjg1LTJhMTBhZGRjLTI0MDUtNGJkYy05Zjg4LWVhNmVjNWI1OWZhOS5qcGciLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.2ukPgFqS2cNfP3jQLMFnTHsxlFbiBf-4oFMbPyogajI",
          name: "Math"
        }
      ],
      team1: {
        'name': 'All About Eve',
        'color': 'red',
        'points': 50,
        'players': []
      },
      team2: {
        'name': 'Bonanza',
        'color': 'blue',
        'points': 45,
        'players': []
      },
      team3: {
        'name': 'Asteroids',
        'color': 'orange',
        'points': 30,
        'players': []
      }
    }
  },
  methods: {
  }
}
</script>
<style >
  .game-main {
    background-color: #929292;
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
    position: relative;
    /* top: -30px; */
  }
  .row {
    display: flex;
    padding: 30px;
  }
  .game-main > .row {
    flex: 1;
    position: relative;
  }
  .host-video {
    margin: auto;
  }
  .host-row > div {
    /* max-width: 460px !important; */
    /* margin: auto; */
  }
  .host-row {
    min-height: 240px;
  }
  .row-two-teams > .col {
    flex-basis: 50%;
  }
  .row-current-team,
  .row-two-teams {
    background-color: #525252;
  }
  .head-to-head {
    position: fixed;
    width: 100%;
    height: 100%;
  }
</style>
