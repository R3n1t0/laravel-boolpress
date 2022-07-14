import Vue from "vue";

import VueRouter from "vue-router";


Vue.use(VueRouter);

import HomeComp from './components/pages/HomeComp';
import AboutComp from './components/pages/AboutComp';
import ContactsComp from './components/pages/ContactsComp';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComp
        },
        {
            path: '/',
            name: 'home',
            component: AboutComp
        },
        {
            path: '/',
            name: 'home',
            component: ContactsComp
        }
    ]
});

export default router;

