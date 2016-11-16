<template>
    <section>
        <select id="category_id" name="category_id">
            <option v-for="(category, index) in categories" :value="index">{{category}}</option>
        </select>
        <label>Category</label>
    </section>
</template>
<style>

</style>
<script>
    export default{
        props:{
            categories: {
                default: () => null,
            },
        },
        data () {
            return {

            };
        },
        methods:{
            sleep(time){
                return new Promise((resolve) => setTimeout(resolve, time));
            },
        },
        mounted(){

              $('#category_id').material_select();

        }
    }
</script>
