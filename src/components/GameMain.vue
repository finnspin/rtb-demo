<template>
  <v-layout column>
    <div class="
      fill-height
      game-main
      flex-column
      d-flex">
      <div class="
        score-table-row
        d-flex
        shrink
        flex-column
        justify-center
        align-center">
        <div>
          <span class="orange-text">{{team1.name}}:</span><span> {{team1.score}}pts</span> |
          <span class="orange-text">{{team2.name}}:</span><span> {{team2.score}}pts</span> |
          <span class="orange-text">{{team3.name}}:</span><span> {{team3.score}}pts</span>
        </div>
        <div class="timer"><span>14:11</span></div>
      </div>
      <div class="
        current-team-row
        d-flex
        flex-column
        shrink
        justify-center
        align-center">
        <PlayerIconStack :bus="bus1" class="justify-center">
          <PlayerIcon
            v-for="(player, i) in team1.players"
            :key="team1.name + '-' + i"
            :color="team1.color">
            <template v-slot:name-top>
              <span class="player-name">{{player.name}}</span>
            </template>
          </PlayerIcon>
        </PlayerIconStack>
        <div class="team-tag-wrap"><div class="team-tag">{{team1.name}}</div></div>
      </div>
      <div class="
        game-row
        grow
        d-flex
        flex-column
        justify-center
        align-center ">
        <GameContainer />
      </div>
      <div class="
        two-teams-row
        row
        shrink
        no-gutters">
        <div class="
          team-2-col
          col-12
          col-md-6
          d-flex
          flex-column
          justify-center
          align-center">
          <div class="team-tag-wrap"><div class="team-tag">{{team2.name}}</div></div>
          <PlayerIconStack :bus="bus2" class="justify-center">
            <PlayerIcon
              v-for="(player, i) in team2.players"
              :key="team2.name + '-' + i"
              :color="team2.color">
              <template v-slot:name-bottom>
                <span class="player-name">{{player.name}}</span>
              </template>
            </PlayerIcon>
          </PlayerIconStack>
        </div>
        <div class="
          team-3-col
          d-flex
          col-12
          col-md-6
          flex-column
          justify-center
          align-center">
          <div class="team-tag-wrap"><div class="team-tag">{{team3.name}}</div></div>
          <PlayerIconStack :bus="bus3" class="justify-center">
            <PlayerIcon v-for="(player, i) in team3.players" :key="team3.name + '-' + i"
            :color="team3.color">
              <template v-slot:name-bottom>
                <span class="player-name">{{player.name}}</span>
              </template>
            </PlayerIcon>
          </PlayerIconStack>
        </div>
      </div>
    </div>
  </v-layout>
</template>

<script>
// @ is an alias to /src
import PlayerIcon from '@/components/PlayerIcon.vue';
import PlayerIconStack from '@/components/PlayerIconStack.vue';
import GameContainer from '@/components/GameContainer.vue';
import random from 'random-name';
import Vue from 'vue';

export default {
  name: 'GameMain',
  components: {
    PlayerIcon,
    PlayerIconStack,
    GameContainer
  },
  data() {
    return {
      bus1: new Vue(),
      bus2: new Vue(),
      bus3: new Vue(),
      team1: {
        name: "Team 1",
        color: "#558b2f",
        players: [],
        score: 99
      },
      team2: {
        name: "Team 2",
        color: "#f44336",
        players: [],
        score: 99
      },
      team3: {
        name: "Team 3",
        color: "#2196f3",
        players: [],
        score: 99
      }
    }
  },
  methods: {
    play(bus) {
      bus.$emit('play')
    }
  },
  created() {
    let i = 0;
    for (i = 0; i < 6; i++)
      this.team1.players.push({
        name: random.first()
      })

    for (i = 0; i < 4; i++)
      this.team2.players.push({
        name: random.first()
      })

    for (i = 0; i < 8; i++)
      this.team3.players.push({
        name: random.first()
      })

  },
  mounted() {
    setTimeout(() => {
      this.play(this.bus1);
    }, 500)

    setTimeout(() => {
      this.play(this.bus2);
      this.play(this.bus3);
    }, 1500)
  }
}
</script>
<style scoped lang="scss">

  $color1: #68635f;
  $color2: #2d2c2a;
  $color3: #68635f;
  $color4: #f36523;
  $color5: #837e7b;
  $color6: #c3bcb6;

  .game-row {
    padding: 20px;
    position: relative;
    overflow: hidden;
    &::before {
      content: "";
      background-image: url('../assets/honeycomb-texture.png');
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0.15;
      background-size: 600px;
    }
    & > * {
      position: relative;
    }
  }

  .vertical-line {
    height: 80%;
    width: 1px;
    margin-right: -1px;
    background-color: #616161;
    align-self: center;
  }

  .current-team-row {
    position: relative;
    border-bottom: 2px solid #f36523;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.33);
    background-color: #413d3c;
    .stack-container {
      padding-bottom: 22px;
    }
    .team-tag {
      top: 10px;
    }
    .team-tag-wrap {
      bottom: 0;
    }
  }

  .two-teams-row {
    box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.33);
    background-color: #413d3c;
    .team-tag-wrap {
      top: 0;
    }
    .team-tag {
      top: -14px;
    }
    .stack-container {
      padding-top: 22px;
    }
    .team-2-col,
    .team-3-col {
      border-top: 2px solid #f36523;
      position: relative;
    }
  }

  .team-tag-wrap {
    position: absolute;
    width: 100%;
  }

  .team-tag {
    display: inline-block;
    position: relative;
    background-color: #f36523;
    color: #fff;
    font-size: 18px;
    height: 28px;
    margin-bottom: -28px;
    line-height: 28px;
    position: relative;
    vertical-align: top;
    z-index: 2;
    &::before {
      left: -10px;
    }
    &::after {
      left: 10px;
    }
    &::before,
    &::after {
      vertical-align: top;
      content: "";
      display: inline-block;
      position: relative;
      top: 4px;
      width: 20px;
      height: 20px;
      background-color: $color4;
      transform: rotate(45deg);
    }
  }

  .orange-text {
    color: $color4;
  }

  .score-table-row {
    position: relative;
    background-color: $color2;
    color: $color6;
  }

  .timer {
    width: 100px;
    height: 36px;
    line-height: 36px;
    bottom: -12px;
    z-index: 2;
    right: -10px;
    position: absolute;
    font-size: 25px;
    color: #21ac45;
    span {
      position: relative;
    }
    &::before {
      content: "";
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
      background-color: $color2;
      transform: skewX(40deg);
    }
  }

  .player-name {
    color: $color5;
  }

  .player-icon {
    margin: 6px 14px;
    flex-basis: 8.5%;
    min-width: 75px;
  }

  .stack-container {
    padding: 6px;
    width: 100%;
  }

  .game-main {
    background-color: $color3;
  }
</style>
<style lang="scss">
  .player-icon {
    .circle {
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    }
  }
</style>
