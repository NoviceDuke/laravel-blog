<template>
<section>
        <input v-model="target_tag" @keydown.enter="addTag()" id="tag_input" type="text">

        <!-- 迴圈已暫存在前端的tags -->
        <span v-for="(tag, index) in save_tags" class="tag-chips">
            <input type="hidden" :name="'tags['+index+']'" :value="tag" />
            <div class="chip"  @click="removeTag(tag)">
            {{tag}}
            </div>
        </span>


        <!-- 輸出搜尋的結果  -->
        <ul v-if="isResult" class="collection">
            <li v-for="s in search" v-if="!isAdd(s)" @click="chooseTag(s)" class="cursor collection-item">{{s}}</li>
        </ul>

        <label for="tag_input">Tags</label>
</section>
</template>
<style>
    .tag-chips{
        top: -100px;
        left: 50px;
        position: relative;
    }
    .cursor{
        cursor: pointer;
    }
</style>
<script>
    export default{
        props:{
            linkednames:{
                default: () => null,
            },
            tags: {
                default: () => null,
            },
        },
        data () {
            return {
                target_tag:null,
                search:[],
                save_tags:[],
                toggle:false,
            };
        },
        computed: {
            isResult() {
                if(this.search.length == 0)
                    return false;
                return true;
            },
        },
        watch:{
            target_tag: {
                handler: function (val, oldVal) {
                    if(val!=null&&val!='')
                        this.searchTarget();
                    else
                        this.search=[];
                },
                deep: false
            },
        },
        methods:{
            sleep(time){
                return new Promise((resolve) => setTimeout(resolve, time));
            },
            isAdd(tag) {
                if(this.save_tags.includes(tag))
                {
                    this.search.splice(tag, 1);
                    return true;
                }
                return false;
            },
            addTag(){
                if(this.target_tag!=null&&this.target_tag!=''&&!this.isAdd(this.target_tag))
                {
                    this.save_tags.push(this.target_tag);
                    this.target_tag=null;
                }
            },
            chooseTag(tag){
                this.save_tags.push(tag);
            },
            removeTag(tag){
                this.save_tags.splice(tag, 1);
            },
            searchTarget(){
                var regex = new RegExp(this.target_tag+'.*','i');
                var save_tags = this.save_tags;
                this.search = this.tags.filter((item) => {
                    return (item.match(regex) != null);
                });
            },
            checkLinked(){
                if(this.linkednames == null)
                    return;
                // 比對傳入的tag_names與全部的tag，用於已經擁有tags的文章
                this.linkednames.forEach((name) => {
                    let linkedname = this.tags.filter((item) => {
                        return (item == name);
                    });
                    this.chooseTag(linkedname[0]);
                });
            }
        },
        mounted(){
            this.checkLinked();
        }
    }
</script>
