<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Sample Adding Players</router-link> |
      <router-link to="/game">Game</router-link> |
      <router-link to="/video-row-preview">VideoRow</router-link> |
      <router-link to="/rect-shape-preview">RectShape</router-link>
    </div>
    <router-view/>
  </div>
</template>

<style>
body {
  background-color: #d2f3eb;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

</style>
