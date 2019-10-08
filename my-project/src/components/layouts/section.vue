<template>
    <div>
        <h4>{{this.name}}</h4>
        <input @keyup="submit()" type="text" id="name">
        <button >submit</button>
        <sect2 />
    </div>
</template>

<script>
    import sect2 from './section2';

    export default {
        name:'sect',
        components:{
            sect2
        },
        data(){
            return {
                name:'Highdee'
            }
        },
        methods:{
            submit(){
                this.name=document.getElementById('name').value;
            },
            
        }

    }
</script>

<style scoped>

</style>
