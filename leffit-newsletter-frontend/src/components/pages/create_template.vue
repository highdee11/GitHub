<template>
    <div >
        
        <div class="row tools" >
            <div class="title col-12 col-sm-6 col-md-4">
                <div class="title">THE TEMPLATE TITLE</div>
            </div>
            <div class="title col-12 col-sm-6 col-md-8">
                <div class="tool"><i class="fa fa-users"></i> SECTIONS: {{this.sections.length}}</div>
            </div>
        </div>
        
            <div :class="this.editMode ? 'templateHolder edit-mode':'templateHolder'">  
                <center> 	
                    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                        <tr>
                            <td align="center" valign="top" id="bodyCell">
                                <table border="0" cellpadding="0" cellspacing="0" width="650" id="emailBody">
                                    <div v-for="(section,index) in this.sections" :key="index" class="temp" >
                                        <div class="sectionTools"><button @click="edittingMode(section)" class="btn">EDIT</button></div>
                                        <div class="sectionBody" v-html="section.content"></div>
                                    </div>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
                <div @click="openModal()" class="defaultTemp">
                    <button  class="btn"><i class="fa fa-plus"></i></button>
                    <br> <br>
                    <p>Add new section</p>
                </div> 
            </div> 
            <div v-if="this.editMode" class="editBoard">

            </div>
        <mailTemplates></mailTemplates>
    </div>
</template>

<script>
import { mapState } from "vuex"
import mailTemplates from "../layouts/templates"
export default {
    name:'create_template',
    components:{
        mailTemplates
    },
    computed:{
        ...mapState({
            sections:state=>state.sections
        })
    },
    data(){
        return {
            editMode:false
        }
    },
    methods:{
        openModal(){
            this.$store.state.templateModal=true;
        },
        edittingMode(section){
            this.editMode=!this.editMode;
        }
    }
}
</script>

<style scoped>
    .container-fluid{
        padding: 0px 10px;
    }
    .templateHolder{
        position: absolute;
        top:8%;
        bottom: 2%;
        left: 0;
        right: 0;
        width: fit-content;
        height: fit-content;
        margin: auto;
        width: 670px;
        border:1px solid lightgray;
        padding: 10px;
        height: 90%;
        overflow-y: scroll;
        /* transition: all s linear; */
    }
    .editBoard{
        position: absolute;
        top:8%;
        bottom: 2%;
        right: 0;
        width: fit-content;
        height: fit-content;
        margin: auto;
        width: 500px;
        border:1px solid lightgray;
        padding: 10px;
        height: 90%;
        overflow-y: scroll;
        background: lightgray;
    }
    .templateHolder.edit-mode{
        right: initial;
        left: 10px;
        /* transition: all .5s linear; */
    }
    .defaultTemp{
        border:1px solid lightgray;
        text-align: center;
        padding: 30px 10px;
        transition: all .2s linear;
        margin-top: 30px;
    }
    .defaultTemp .btn{
        border:1px solid lightgray;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        transition: all .2s linear;
        color: gray;
    }
    .defaultTemp:hover .btn{
        transform: scale(1.3);
        background: white;
    }
    .defaultTemp:hover {
        transform: scale(0.9);
        background: #d3d3d31a;
    }
    .tools{
        padding: 10px 5px;
        margin-top: 30px;
        background: #333333;
        position: fixed;
        width: 100%;
        z-index: 99;
        color: white;
        left: 0;
        right: 0;
        margin: auto;
    }
    .tools .title{}
    .tools .title div.title{
        font-size: 20px;
        height: 100%; 
        display: block;
    }
    .tool{ 
        color: gray;
        font-weight: 500;
        font-size: smaller;
        position: absolute;
        top: 0px;
        bottom: 0;
        margin: auto;
        height: fit-content;
    }
    .temp{
        position: relative;
    }
    .temp:hover .sectionTools button{
        background: black;
    }
    .sectionTools{
        position: absolute;
        top:0;
        right:0;  
    }
    .sectionTools button.btn{
        background: #000000cc;
        color: white;
        border-radius: 0px;
    }
</style>