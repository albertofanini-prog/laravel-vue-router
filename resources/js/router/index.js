//File a parte per Vue-Router
//Si chiama index perchè front.js in import prende in automatico index.js

//importare Vue
import Vue from 'vue'

//importare componente VueRouter
import VueRouter from 'vue-router'

//indicare di usare vuerouter
Vue.use(VueRouter)

//importare componente da assegnare alla rotta
import Posts from '../pages/Posts.index.vue'

import Post from '../pages/Post.show.vue'

import Contact from '../pages/Contact.vue'

//definire delle rotte in array
const routes = [
    //routes deve contenere oggetti
    {
        //proprietà path che contiene percorso
        path: '/posts',
        //assegnare nome
        name: 'posts.index',
        //collegare componente importato da visualizzare
        component: Posts,
    },
    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: Post,
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    }
]

//creare istanza router
    //passare modalità: history
    //passare array con rotte
const router = new VueRouter({
    mode: 'history',
    routes: routes
})

//esportare istanza router a front.js
export default router