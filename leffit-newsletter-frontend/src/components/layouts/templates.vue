<template>
    <div v-if="this.templateModal" id="templateModal">
        <div class="head">
            <h3>Choose Template</h3>

            <div class="search"><input type="text" class="form-control" placeholder="Search template by name"></div>
            <div class="remove"><button @click="removeModal()" class="btn"><i class="fa fa-remove"></i></button></div>
        </div>
        <hr>
        <div class="body">
            <div class="temps">
                <div @click="selectTemp(temp.id)" v-for="(temp,index) in this.templateViews" :key="index" class="temp">
                    <!-- <div class="img" :style="'background:url('+temp.image+')'"></div> -->
                    
                    <div class="img" >
                        <div class="preview" >
                            <div class="previewContainer" v-html="temp.content"></div>
                        </div>
                    </div>
                    <h5>{{temp.title}}</h5>
                    <p class="m-0">
                        {{temp.text}}
                    </p>
                </div>  
            </div>
        </div>
    </div>
</template>

<script> 
import { mapState} from "vuex";
export default {
    name:"mailTemplates",
    components:{
        
    },
    computed:{
        ...mapState({
            templateModal:state=>state.templateModal,
            templateViews:state=>state.templateViewData
        })
    },
    methods:{
        removeModal(){
            this.$store.state.templateModal=false;
        },
        selectTemp(id){
            let selected=this.templateViews.find(tp=>tp.id == id);

            this.$store.state.activeSection=selected;
            this.$store.state.sections.push(selected);
            this.$store.state.templateModal=false;

            // console.log(selected.content);
        }
    },
    created() {
        let button=0;
        
        document.onkeyup=(e)=>{
            button=e.which || e.button; 
            // console.dir(e.target);
            if(button == 27 && this.templateModal && e.target.nodeName != 'INPUT'){
                
                this.$store.state.templateModal=false;
            }
        }
    },
}
</script>

<style scoped>
    #templateModal{
        position: fixed;
        top:0;
        bottom: 0;
        left: 0;
        right:0;
        margin: auto;
        background: white;
        box-shadow: 0px 0px 10px #808080ba;
        width: 95%;
        height: 95%;
        padding: 20px;
        border-radius: 5px;
        z-index: 9999;
    }

    #templateModal .head{
        display: flex;
        justify-content: space-between;
    }
    #templateModal .head h3{
        color: gray;
        font-size: 20px;
    }
    #templateModal .head .search{
        width: 400px;
    }

    #templateModal .temps{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-column-gap: 20px;
        overflow-y: scroll;
        padding: 10px;
    }
    #templateModal .temps .temp{
        height: 350px;
        box-shadow: 1px 3px 5px #b8b8b8;
        padding: 10px;
        overflow: hidden;
        margin-bottom: 20px;
        transition: all .2s linear;
        position: relative;
        
    }
    #templateModal .temps .temp:hover{
        box-shadow: 2px 7px 10px lightgray;
        cursor: pointer;
    }
     #templateModal .temps .temp:hover .img{
        transform: scale(0.98);
        border-radius: 2px; 
    }
    #templateModal .temps .temp .img{
        height: 60%;
        background-position: center !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        transition: all .2s linear;
        text-align: center;
        display: flex;
        justify-content: center;
        background: #333;
        overflow: hidden;
        border: 2px solid #333333;
    }   
    #templateModal .temps .temp .img .preview{
        transform: scale(0.4) !important;  
    }
    .previewContainer{
        background: white;
        padding: 25px 0px;
    }
    #templateModal .temps .temp h5{
        color: black;
        margin-top: 10px;
        font-size: 15px;
    }
    #templateModal .temps .temp p{
        color: gray;
        font-size: 13px;
        text-align: justify;
    }
</style>
<style  scoped>
    @media (max-width:1000px){
        #templateModal .temps{ 
            grid-template-columns: 1fr 1fr 1fr; 
        }
    }

    @media (max-width:760px){
        #templateModal .temps{ 
            grid-template-columns: 1fr 1fr; 
        }
    }
    @media (max-width:400px){
        #templateModal .temps{ 
            grid-template-columns: 1fr; 
        }
    }
</style>
<style  scoped>
/*////// RESET STYLES //////*/
body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}
table{border-collapse:collapse;}
img, a img{border:0; outline:none; text-decoration:none;}
h1, h2, h3, h4, h5, h6{margin:0; padding:0;}
p{margin: 1em 0;}

/*////// CLIENT-SPECIFIC STYLES //////*/
.ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
#outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
img{-ms-interpolation-mode: bicubic;} /* Force IE to smoothly render resized images. */
body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */

/*////// FRAMEWORK STYLES //////*/
.flexibleContainerCell{padding-top:20px; padding-Right:20px; padding-Left:20px;}
.bottomShim{padding-bottom:20px;}
.imageContent, .imageContentLast{padding-bottom:20px;}
.nestedContainerCell{padding-top:20px; padding-Right:20px; padding-Left:20px;}

/*////// GENERAL STYLES //////*/
body, #bodyTable{background-color:#333333;}
#bodyCell{padding-top:40px; padding-bottom:40px;}
#emailBody{background-color:#FFFFFF;  border-collapse:separate; border-radius:2px;}
h1, h2, h3, h4, h5, h6{color:#202020; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left;}
.textContent, .textContentLast{color:#404040; font-family:Helvetica; font-size:15px; line-height:125%; text-align:Left; padding-bottom:20px;}
.textContent a, .textContentLast a{color:#2C9AB7; text-decoration:underline;}
.nestedContainer{background-color:#E5E5E5; border:1px solid #CCCCCC;}
.emailButton{background-color:#E95D70; border-collapse:separate; border-radius:0px;}
.buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px;  line-height:100%; padding:20px; text-align:center;}
.buttonContent a{color:#FFFFFF; display:block; text-decoration:none;}
.emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
.emailCalendarMonth{background-color:#2C9AB7; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
.emailCalendarDay{color:#2C9AB7; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}

/*////// MOBILE STYLES //////*/
@media only screen and (max-width: 480px){			
    /*////// CLIENT-SPECIFIC STYLES //////*/
    body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

    /*////// FRAMEWORK STYLES //////*/
    /*
        CSS selectors are written in attribute
        selector format to prevent Yahoo Mail
        from rendering media query styles on
        desktop.
    */
    table[id="emailBody"], table[class="flexibleContainer"]{width:100% !important;}

    /*
        The following style rule makes any
        image classed with 'flexibleImage'
        fluid when the query activates.
        Make sure you add an inline max-width
        to those images to prevent them
        from blowing out. 
    */
    img[class="flexibleImage"]{height:auto !important; width:100% !important;}

    /*
        Make buttons in the email span the
        full width of their container, allowing
        for left- or right-handed ease of use.
    */
    td[class="buttonContent"]{padding:0 !important;}
    td[class="buttonContent"] a{padding:15px !important;}

    td[class="textContentLast"], td[class="imageContentLast"]{padding-top:20px !important;}

    /*////// GENERAL STYLES //////*/
    td[id="bodyCell"]{padding-top:10px !important; padding-Right:10px !important; padding-Left:10px !important;}
}
</style>