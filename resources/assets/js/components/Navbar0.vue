<template>
    <nav class="blue-grey darken-2 nav-height-fix">
        <div class="nav-wrapper blue-grey darken-2 nav-content-fix">
          <a href="" class="brand-logo logo-fix">Blog</a>
          <ul class="right hide-on-med-and-down">
                <li v-if="islogin"><a :href="logout_url">登出</a></li>
                <li v-else><a :href="login_url">登入</a></li>
          </ul>
        <!--Mobile DropDown Button-->
        <a class="dropdown-button hide-on-large-only" href="#!" data-activates="dropdown1">
        <i class="material-icons" style="margin-left:10px;">menu</i>
        <i class="mdi-navigation-arrow-drop-down right"></i>
        </a>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="">Home</a></li>
                <li v-if="islogin"><a :href="logout_url">登出</a></li>
                <li v-else><a :href="login_url">登入</a></li>
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
        data: function () {
            return {
                logout_url : this.baseurl+'/logout',
                login_url : this.baseurl+'/login',
            };
        },
        mounted(){
            // console.log('Data-Binding Component Ready'+this.message);
        }
    }
</script>
