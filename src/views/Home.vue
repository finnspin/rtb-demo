<template>
  <div class="
    game-main
    flex-column
    d-flex
    justify-content-between">
    <div class="
      score-table-row
      d-flex
      flex-column
      justify-content-center
      align-items-center">
      <div class="score-table">
        <span class="orange-text">{{team1.name}}:</span><span> {{team1.score}}</span> |
        <span class="orange-text">{{team2.name}}:</span><span> {{team2.score}}</span> |
        <span class="orange-text">{{team3.name}}:</span><span> {{team3.score}}</span>
      </div>
    </div>
    <div class="
      current-team
      d-flex
      flex-column
      justify-content-center
      dark-grey
      align-items-center">
      <StackContainer class="justify-content-center">
        <PlayerIcon
          v-for="(player, i) in team1.players"
          :key="team1.name + '-' + i"
          :color="team1.color">
          <template v-slot:name-top>
            <span class="player-name">{{player.name}}</span>
          </template>
        </PlayerIcon>
      </StackContainer>
      <div class="team-tag-wrap"><div class="team-tag">{{team1.name}}</div></div>
    </div>
    <div class="
      flex-grow-1
      d-flex
      flex-column
      justify-content-center
      align-items-center ">
      <PlayerIcon />
    </div>
    <div class="
      tow-teams-row
      row
      no-gutters
      dark-grey">
      <div class="
        team-2-col
        col-lg-6
        col-md-12
        d-flex
        flex-column
        justify-content-center
        align-items-center">
        <div class="team-tag-wrap"><div class="team-tag">{{team2.name}}</div></div>
        <StackContainer class="justify-content-start">
          <PlayerIcon
            v-for="(player, i) in team2.players"
            :key="team2.name + '-' + i"
            :color="team2.color">
            <template v-slot:name-bottom>
              <span class="player-name">{{player.name}}</span>
            </template>
          </PlayerIcon>
        </StackContainer>
      </div>
      <div class="
        d-flex
        vertical-line
      "></div>
      <div class="
        team-3-col
        col-lg-6
        col-md-12
        d-flex
        flex-column
        justify-content-center
        align-items-center">
        <div class="team-tag-wrap"><div class="team-tag">{{team3.name}}</div></div>
        <StackContainer class="justify-content-end">
          <PlayerIcon v-for="(player, i) in team3.players" :key="team3.name + '-' + i"
          :color="team3.color">
            <template v-slot:name-bottom>
              <span class="player-name">{{player.name}}</span>
            </template>
          </PlayerIcon>
        </StackContainer>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import PlayerIcon from '@/components/PlayerIcon.vue';
import StackContainer from '@/components/StackContainer.vue';
import random from 'random-name';
export default {
  name: 'Home',
  components: {
    PlayerIcon,
    StackContainer
  },
  data() {
    return {
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

  }
}
</script>
<style scoped>
  .team-tag-wrap {
    position: absolute;
    width: 100%;
  }
  .team-2-col .team-tag-wrap,
  .team-3-col .team-tag-wrap {
    top: 0;
  }
  .current-teams .team-tag-wrap {
    bottom: 0;
  }
  .vertical-line {
    height: 80%;
    width: 1px;
    margin-right: -1px;
    background-color: #616161;
    align-self: center;
  }
  .current-team .team-tag {
    top: 10px;
  }
  .tow-teams-row .team-tag {
    top: -14px;
  }
  .tow-teams-row .stack-container {
    padding-top: 26px;
  }
  .tow-teams-row,
  .current-team {
    position: relative;
  }
  .current-team .stack-container {
    padding-bottom: 26px;
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
  }
  .team-tag::before {
    left: -10px;
  }
  .team-tag::after {
    left: 10px;
  }
  .team-tag::before,
  .team-tag::after {
    vertical-align: top;
    content: "";
    display: inline-block;
    position: relative;
    top: 4px;
    width: 20px;
    height: 20px;
    background-color: #f36523;
    transform: rotate(45deg);
  }
  .tow-teams-row {
    box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.33);
  }
  .current-team {
    border-bottom: 2px solid #f36523;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.33);
  }
  .team-2-col,
  .team-3-col {
    border-top: 2px solid #f36523;
  }
  .orange {
    background-color: #f36523;
  }
  .orange-text {
    color: #f36523;
  }
  .score-table-row {
    background-color: #2d2c2a;
  }
  .player-name {
    color: #fff;
  }
  .stack-container {
    padding: 10px;
  }
  .current-team .stack-container {
    width: 100%;
  }
  .stack-container .player-icon {
    margin: 6px 14px;
    flex-basis: 10%;
    min-width: 80px;
  }
  .score-table {
    color: #fff;
  }
  .dark-grey {
    background-color: #413d3c;
  }
  .light-grey {
    background-color: #68635f;
  }
  .game-main {
    background-color: #68635f;
    position: absolute;
    width: 100%;
    height: 100%;
  }
  .icon {
    max-width: 100px;
  }
</style>
