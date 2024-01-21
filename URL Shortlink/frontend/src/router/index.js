import { createRouter, createWebHistory } from 'vue-router'
import { authStore } from '../stores/auth'
import { computed } from 'vue'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import ContactView from '../views/ContactView.vue'
import ProfileView from '../views/ProfileView.vue'
import PanelView from '../views/PanelView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      beforeEnter: (to, from, next) => {
        const store = authStore()
        let isSignedIn = computed(() => store.response)
        if (isSignedIn.value) {
          next('/profile')
        } else {
          next()
        }
      }
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
      beforeEnter: (to, from, next) => {
        const store = authStore()
        let isSignedIn = computed(() => store.response)
        if (isSignedIn.value) {
          next('/profile')
        } else {
          next()
        }
      }
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView
    },
    {
      path: '/profile',
      name: 'profile',
      component: ProfileView,
      beforeEnter: (to, from, next) => {
        const store = authStore()
        let isSignedIn = computed(() => store.response)
        if (!isSignedIn.value) {
          next('/login')
        } else {
          next()
        }
      }
    },
    {
      path: '/panel',
      name: 'panel',
      component: PanelView,
      beforeEnter: (to, from, next) => {
        const store = authStore()
        let isSignedIn = computed(() => store.response)
        if (!isSignedIn.value) {
          next('/login')
        } else {
          next()
        }
      }
    },
  ]
})

export default router
