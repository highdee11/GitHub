import Vue from 'vue'
import Router from 'vue-router'
import dashboard from './components/pages/dashboard'
import create_template from './components/pages/create_template';
Vue.use(Router);

const router =new Router({
    mode:'history',
    routes:[
        {
            path:'/',
            component:dashboard
        },
        {
            path:'/create-new-template',
            component:create_template
        }
    ]
});


export default router;