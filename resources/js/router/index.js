//File a parte per Vue-Router
//Si chiama index perchè front.js in import prende in automatico index.js

//importare Vue
import Vue from 'vue'

//importare componente VueRouter
import VueRouter from 'vue-router'

//indicare di usare vuerouter
Vue.use(VueRouter)

//definire delle rotte in array
const routes = [

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