<template>
  <div id="app">

    <div id="nav">
      <div>
        <router-link to="/">Sample Adding Players</router-link> |
        <router-link to="/game">Game</router-link> |
        <router-link to="/video-row-preview">VideoRow</router-link> |
        <router-link to="/rect-shape-preview">RectShape</router-link> |
        <router-link to="/head-to-head-preview">HeadToHead</router-link> |
        <router-link to="/head-to-head-preview-2">HeadToHead2</router-link>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<style>
body {
  background-color: #d2f3eb;
}
#app {
  position: absolute;
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  height: 100%;
  width: 100%;
}
#nav {
  z-index: 99;
  position: relative;
  height: 30px;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

* {
  margin: 0;
  padding: 0;
}

</style>
