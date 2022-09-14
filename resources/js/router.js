import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/Homepage.vue';
import AboutPage from './pages/Aboutpage.vue';
import BlogPage from './pages/Blogpage.vue';
import FourOFour from './pages/FourOFour.vue';
import SinglePost from './pages/SinglePost.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        { 
            path: '/',
            component: HomePage,
            name: 'home'
        },
        { 
            path: '/about',
            component: AboutPage,
            name: 'about'
        },
        { 
            path: '/blog',
            component: BlogPage,
            name: 'blog'
        },
        { 
            path: '/blog/:slug',
            component: SinglePost,
            name: 'singlepost'
        },
        { 
            path: '/*',
            component: FourOFour,
            name: 'FourOFour'
        }
    ]
});

export default router;