<template>
    <nav class="blue-grey darken-2 nav-height-fix">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo center"></a>
        <ul class="left hide-on-med-and-down">
          <li :class="{ active: isURL('/blog') }"><a :href="path('/blog')">Home</a></li>
          <!-- <li :class="{ active: isURL('/about') }"><a :href="path('/about')">About</a></li> -->
          <li :class="{ active: isURL('/article') }"><a :href="path('/article')">Articles</a></li>
          <li :class="{ active: isURL('/category') }"><a :href="path('/category')">Categories</a></li>
          <!-- <li :class="{ active: isURL('/tag') }"><a :href="path('/tag')">Tags</a></li> -->
        </ul>


        <ul class="right hide-on-med-and-down">
              <li v-if="islogin"><a :href="path('/logout')">登出</a></li>
              <li v-else><a :href="path('/login')">登入</a></li>
        </ul>

        <!--Mobile DropDown Button-->
        <a class="dropdown-button hide-on-large-only" href="#!" data-activates="dropdown1">
        <i class="material-icons" style="margin-left:10px;">menu</i>
        <i class="mdi-navigation-arrow-drop-down right"></i>
        </a>
        <ul id='dropdown1' class='dropdown-content'>
            <li :class="{ active: isURL('/blog') }"><a :href="path('/blog')">Home</a></li>
            <!-- <li :class="{ active: isURL('/about') }"><a :href="path('/about')">About</a></li> -->
            <li :class="{ active: isURL('/article') }"><a :href="path('/article')">Articles</a></li>
            <li :class="{ active: isURL('/category') }"><a :href="path('/category')">Categories</a></li>
            <li :class="{ active: isURL('/tag') }"><a :href="path('/tag')">Tags</a></li>
            <li v-if="islogin"><a :href="path('/logout')">登出</a></li>
            <li v-else><a :href="path('/login')">登入</a></li>
        </ul>
        <!--Mobile DropDown Button-->
      </div>
    </nav>
</template>
<script>
    export default{
        props:{
            islogin: {
                type: Boolean,
                default: () => false,
            },
            baseurl:{
                type: String,
                default: () => '',
            },
        },
        methods:{
            isURL(key){
                if(window.location.pathname == key)
                    return true;
            },
            path(key){
                return this.baseurl+key;
            }
        },
        data () {
            return {

            };
        },
        mounted(){
            document.getElementById("loading-nav").remove();
        }
    }
</script>
