<template>
<div class="game-main">
  <div class="team">
    <b>{{ team1.name  }}</b><span @click="addPlayer(team1)"> add </span> <span @click="removePlayer(team1)"> remove </span><br/>
    <div class="player" :key="'team-1-' + i" v-for="(player, i) in team1.players">
      {{ i + 1 }}. {{ player.name }}
    </div>
  </div>
  <div class="team">
    <b>{{ team2.name  }}</b><span @click="addPlayer(team2)"> add </span> <span @click="removePlayer(team2)"> remove </span><br/>
    <div class="player" :key="'team-2-' + i" v-for="(player, i) in team2.players">
      {{ i + 1 }}. {{ player.name }}
    </div>
  </div>
  <div class="team">
    <b>{{ team3.name  }}</b><span @click="addPlayer(team3)"> add </span> <span @click="removePlayer(team3)"> remove </span><br/>
    <div class="player" :key="'team-3-' + i" v-for="(player, i) in team3.players">
      {{ i + 1 }}. {{ player.name }}
    </div>
  </div>
</div>
</template>

<script>
// @ is an alias to /src
export default {
  name: 'Home',
  components: {

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
    addPlayer(t) {
      var obj = {}
      // if (this.team1.players) players = this.team1.players
      obj.name = "Finn"
      obj.points = "32"
      t.players.push(obj)
      console.log(t)
    },
    removePlayer(t) {
      t.players.pop()
    }
  }
}
</script>
<style >
.team {
  border: 2px solid green;
  background-color: #ddd;
  width: 1000px;
  height: 200px;
  margin: auto;
}

.playerName {
  text-align: center;
}

.player {
  display: inline-flex;
  margin: 10px;
  border: 2px solid blue;
  background-color: #ddd;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  padding: 5px
}

.shadow {
  -webkit-box-shadow: 2px 2px 2px 3px #ccc;
  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow: 2px 2px 2px 3px #ccc;
  /* Firefox 3.5 - 3.6 */
  box-shadow: 2px 2px 2px 3px #ccc;
  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
}
</style>
