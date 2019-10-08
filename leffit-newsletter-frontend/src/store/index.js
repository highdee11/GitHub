import Vue from 'vue'
import vuex from 'vuex'
import mutations from './mutation'
import getters from './getter'
import actions from './actions'
import Allsections from "./sections";

Vue.use(vuex);

const store=new vuex.Store({
    state:{ 
        templateModal:false,
        templateTitle:'',
        templateViewData:Allsections,
        sections:[],
        activeSection:{
            id:0,title:'',image:'',content:''
        }
    },
    mutations,
    getters,
    actions
})


export default store