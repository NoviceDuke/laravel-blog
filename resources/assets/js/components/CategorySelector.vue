<template>
    <section>
        <section @click="popModal()">
            <select id="category_id" name="category_id">
                <option v-for="(category, index) in real_categories" :value="category.id" v-text="category.name"></option>
                <optgroup label="+新增分類"></optgroup>
            </select>
            <label>Category</label>
        </section>
        <!-- Modal -->
        <div id="add_modal" class="modal bottom-sheet" style="max-height:55%">
            <div class="modal-content">
                <h5>新增分類</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate" v-model="name">
                        <label for="name">Category Name</label>
                    </div>
                    <div class="input-field col s12">
                        <p>Style Type</p>
                        <p class="range-field">
                         <input @mouseup="styleDrop()" type="range" id="test5" min="1" :max="styles.length" />
                        </p>
                        <div v-if="style" class="card-panel" :class="cssbase">
                          <span class="white-text">
                              {{style.name}}
                          </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="#!" @click="addPost()" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
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
            styles: {
                default: () => null,
            },
        },
        data () {
            return {
                real_categories : this.categories,
                resource: this.$resource('/category{/id}'),
                style : {
                    css: "deep-purple-darken-3",
                    id: 53,
                    main_color: "#4527a0",
                    name: "Deep Purple Darken 3",
                },
                name: null,
            };
        },
        computed:{
            cssbase(){
                var css = this.style.css.split('-');
                var result = css[0]+" ";
                if(css.length>=2)
                {
                    result+=css[0]+'-'+css[1]+' ';
                }
                if(css.length>=3)
                {
                    result+=css[1]+'-'+css[2]+' ';
                }
                if(css.length>=4)
                {
                    result+=css[2]+'-'+css[3];
                }

                return result;
            },
            cssdaken(){
                return 'lighten-5';
            }
        },
        methods:{
            sleep(time){
                return new Promise((resolve) => setTimeout(resolve, time));
            },
            popModal(){
                $('#add_modal').modal('open');
            },
            addPost(){
                this.resource.save({name: this.name, style_id: this.style.id}).then((response) => {
                    // console.log(response.data);
                    this.real_categories.unshift(response.data);
                    $('#category_id').material_select('destroy');
                    this.sleep(300).then(() => {
                        $('#category_id').material_select();
                    });
                }, (response) => {
                    console.log(response);
                });
            },
            styleDrop(){
                console.log('drop');
                var index = $('.value').text();
                this.style = this.styles[index];
            }
        },
        mounted(){
            //   $('.modal-trigger').leanModal();
              $('#category_id').material_select();
              $('#style_id').material_select();
              $('.modal').modal();
        }
    }
</script>
