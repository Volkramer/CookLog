import Vue from 'vue'
import Router from 'vue-router'
import HomePage from '@/views/HomePage.vue'
import ListStockListsPage from "@/views/ListStockListsPage";
import StockListPage from "@/views/StockListPage";
import SignUpPage from "@/views/SignUpPage.vue";
import ShoppingListPage from "@/views/ShoppingListPage";
import SignInPage from "@/views/SignInPage";

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/AboutPage.vue')
    },
    {
      path: '/stock/:id',
      name: 'stock',
      component: StockListPage
    },
    {
      path: '/stocks',
      name: 'stocklists',
      component: ListStockListsPage
    },
    {
      path: '/signup',
      name: 'signup',
      component: SignUpPage
    },
    {
      path: '/signin',
      name: 'signin',
      component: SignInPage
    },
    {
      path: '/shoppinglist',
      name: 'shoppinglist',
      component: ShoppingListPage
    },
  ]
})
