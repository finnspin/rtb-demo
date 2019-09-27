<template>
  <div class="game-main">
    <div class="row row-timer">
      <div>
        <span class="team-name">Team 1: </span><span class="points">142</span> |
        <span class="team-name">Team 2: </span><span class="points">142</span> |
        <span class="team-name">Team 3: </span><span class="points">142</span>
      </div>
      <div class="timer"><span>14:11</span></div>
    </div>
    <div class="row row-current-team">
      <VideoRow :width="740" :height="120" :cols="6" :rows="1"  :delay="0.0" color="#26bfa7"/>
    </div>
    <div class="row host-row">
      <VideoContainer class="host-video"
        src="http://dl5.webmfiles.org/big-buck-bunny_trailer.webm" />
    </div>
    <div class="row row-two-teams">
      <div class="col">
        <VideoRow :width="500" :height="224" :cols="6" :rows="1" :delay="3" color="#731493"/>
      </div>
      <div class="col">
        <VideoRow :width="510" :height="224" :cols="6" :rows="1" :delay="3" color="#ce2a28"/>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import VideoContainer from "@/components/VideoContainer";
import VideoRow from "@/components/VideoRow";
import { Back, TweenMax, Power2 } from "gsap/TweenMax";
export default {
  name: 'Home',
  components: {
    VideoContainer,
    VideoRow
  },
  data() {
    return {
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
  },
  mounted() {

    // TweenMax.set(".host-row", {perspective:3000});
    // TweenMax.set(".host-video", {transformStyle:"preserve-3d"});

    TweenMax.from('.host-video', 0.4, { scale: 0.8, alpha: 0, delay: 0.5, ease: Power2.easeOut })

    const elems = document.getElementsByClassName('rounded');

    for (let i = 0; i < elems.length; i++) {
      console.log(elems[i])
      elems[i].addEventListener('click', () => {
        console.log("click")
        // TweenMax.to(elems[i], 0.4, { borderRadius: 0, ease: Power2.easeOut })
      })
    }

    let toggle = false;

    const w = Math.max(window.innerWidth || 0);

    document.getElementsByClassName('host-video')[0]
      .addEventListener('click', () => {
        TweenMax.to('.host-video', 0.4, {
          scale: toggle ? 0.5 : 1,
          x: toggle ? w / 2 - 150 : 0,
          y: toggle ? -70 : 0,
        })
        toggle = !toggle;
      })
  }
}
</script>
<style>
  #nav {
    display: none;
  }
</style>
<style scoped>
  .game-main {
    background-color: #68635f;
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
    position: relative;
    /* top: -30px; */
  }
  .team-name {
    color: #ff641b;
  }
  .row {
    display: flex;
    padding: 30px;
  }
  .game-main > .row {
    flex: 1;
  }
  .host-video {
    margin: auto;
  }
  .host-row > div {
    /* max-width: 580px !important; */
    margin: auto;
  }
  .row-timer {
    background-color: #2d2c2a;
    color: #fff;
    text-align: center;
    padding: 4px;
    display: flex;
    justify-content: center;
  }
  .host-row {
    min-height: 280px;
  }
  .host-row::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url(https://photos2.fotosearch.com/bthumb/CSP/CSP207/black-and-white-bee-cells-seamless-clipart__k21182512.jpg);
    opacity: 0.05;
  }
  .row-two-teams {
    border-top: 2px solid #d44f34;
    box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.3);
  }
  .row-two-teams > .col {
    flex-basis: 50%;
  }
  .row-current-team {
    /* margin-top: 30px; */
    /* padding-top: 40px; */
    border-bottom: 2px solid #d44f34;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
  }
  .row-current-team > div {
    position: relative;
    top: 12px;
  }
  .row-current-team,
  .row-two-teams {
    background-color: #413d3c;
  }
  .timer {
    z-index: 99;
    position: absolute;
    bottom: -10px;
    right: -10px;
    width: 105px;
    height: 33px;
    font-size: 29px;
    line-height: 30px;
    color: #23b249;
  }
  .timer span {
    position: relative;
  }
  .timer::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #2d2c2a;
    transform: skew(40deg);
  }
</style>
