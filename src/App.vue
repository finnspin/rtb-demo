<template>
  <v-app id="app">
    <!-- <div id="nav">
      <div>
        <router-link to="/">Game</router-link>
      </div>
    </div> -->
    <!-- Sizes your content based upon application components -->
    <v-content>
      <!-- Provides the application the proper gutter -->
      <v-container fluid fill-height pa-0>
        <!-- If using vue-router -->
        <router-view></router-view>
      </v-container>
    </v-content>
  </v-app>
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
  position: absolute;
  height: 30px;
  top: 0;
  left: 0;
  width: 100%;
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
