import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('../views/home.blade.php')
    },
    {
        path: '/another',
        component: require('./views/Another')
    }

];

export default new VueRouter({
    routes
})
