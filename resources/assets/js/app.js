import router from './router'
import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

Vue.use(ElementUI)

const app = new Vue({
  el: '#app',
  router
})
