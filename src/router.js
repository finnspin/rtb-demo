import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Game from './views/Game.vue'
import VideoRowPreview from './views/VideoRowPreview.vue'
import RectShapePreview from './views/RectShapePreview.vue'
import HeadToHeadPreview from './views/HeadToHeadPreview.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/game',
      name: 'game',
      component: Game
    },
    {
      path: '/video-row-preview',
      name: 'video-row-preview',
      component: VideoRowPreview
    },
    {
      path: '/rect-shape-preview',
      name: 'rect-shape-preview',
      component: RectShapePreview
    },
    {
      path: '/head-to-head-preview',
      name: 'head-to-head-preview',
      component: HeadToHeadPreview
    }
  ]
})
