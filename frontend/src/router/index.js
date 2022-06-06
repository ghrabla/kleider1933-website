import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/productdashboard',
    name: 'productdashboard',
    component: () => import('../views/productdashboard.vue')
  },
  {
    path: '/Ordersdashboard',
    name: 'Ordersdashboard',
    component: () => import('../views/Ordersdashboard.vue')
  },
  {
    path: '/productsshop',
    name: 'productsshop',
    component: () => import('../views/productsshop.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../views/login.vue')
  },
  {
    path: '/loginadmin',
    name: 'loginadmin',
    component: () => import('../views/loginadmin.vue')
  },
  {
    path: '/details',
    name: 'details',
    component: () => import('../views/details.vue')
  },
  {
    path: '/womenproduct',
    name: 'womenproduct',
    component: () => import('../views/womenproduct.vue')
  },
  {
    path: '/kidproduct',
    name: 'kidproduct',
    component: () => import('../views/kidproduct.vue')
  },
  {
    path: '/choicedash',
    name: 'choicedash',
    component: () => import('../views/choicedash.vue')
  },
  {
    path: '/choicelogin',
    name: 'choicelogin',
    component: () => import('../views/choicelogin.vue')
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('../views/register.vue')
  },
  {
    path: '/usersdashboard',
    name: 'userdashboard',
    component: () => import('../views/usersviews.vue')
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
