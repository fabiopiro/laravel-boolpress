// gestione dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// inizializzare Vue Router
Vue.use(VueRouter);

// import componenti router
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',          // rotta
            name: 'home',       // nome rotta
            component: Home     // componente
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
    ],
});

export default router;