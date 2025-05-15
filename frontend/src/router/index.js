import { createRouter, createWebHistory } from 'vue-router'
import Mainpage from '@/views/Mainpage.vue'
import Purchase from '@/views/Purchase.vue'

const routes = [
  {
    path: '/',
    name: 'main',
    component: Mainpage
  },
  {
    path: '/purchase/:id',
    name: 'Purchase',
    component: Purchase,
    props : true
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
