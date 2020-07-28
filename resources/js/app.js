/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";

Vue.use(VueRouter);
import TaskComponent from "./components/TaskComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('app-add-component', require('./components/AddTaskComponent.vue').default);
Vue.component('app-edit-component', require('./components/EditTaskComponent.vue').default);



const routes = [
    { path: "/", component: HomeComponent },
    { path: "/taskList", component: TaskComponent }
];

const router = new VueRouter({
    routes:routes, // short for `routes: routes`
    mode:'history'
  })


const app = new Vue({
    el: "#app",
    router:router,
});
