webpackJsonp([0],{10:function(module,exports){module.exports={render:function(){with(this)return _h("nav",{staticClass:"blue-grey darken-2 nav-height-fix"},[_h("div",{staticClass:"nav-wrapper"},[_m(0)," ",_h("ul",{staticClass:"left hide-on-med-and-down"},[_h("li",{"class":{active:isURL("/blog")}},[_h("a",{attrs:{href:path("/blog")}},["Home"])])," ",_h("li",{"class":{active:isURL("/about")}},[_h("a",{attrs:{href:path("/about")}},["About"])])," ",_h("li",{"class":{active:isURL("/article")}},[_h("a",{attrs:{href:path("/article")}},["Articles"])])," ",_h("li",{"class":{active:isURL("/category")}},[_h("a",{attrs:{href:path("/category")}},["Categories"])])," ",_h("li",{"class":{active:isURL("/tag")}},[_h("a",{attrs:{href:path("/tag")}},["Tags"])])])," ",_h("ul",{staticClass:"right hide-on-med-and-down"},[islogin?_h("li",[_h("a",{attrs:{href:path("/logout")}},["登出"])]):_h("li",[_h("a",{attrs:{href:path("/login")}},["登入"])])," "])," "," ",_m(1)," ",_h("ul",{staticClass:"dropdown-content",attrs:{id:"dropdown1"}},[_h("li",{"class":{active:isURL("/blog")}},[_h("a",{attrs:{href:path("/blog")}},["Home"])])," ",_h("li",{"class":{active:isURL("/about")}},[_h("a",{attrs:{href:path("/about")}},["About"])])," ",_h("li",{"class":{active:isURL("/article")}},[_h("a",{attrs:{href:path("/article")}},["Articles"])])," ",_h("li",{"class":{active:isURL("/category")}},[_h("a",{attrs:{href:path("/category")}},["Categories"])])," ",_h("li",{"class":{active:isURL("/tag")}},[_h("a",{attrs:{href:path("/tag")}},["Tags"])])," ",islogin?_h("li",[_h("a",{attrs:{href:path("/logout")}},["登出"])]):_h("li",[_h("a",{attrs:{href:path("/login")}},["登入"])])," "])," "])])},staticRenderFns:[function(){with(this)return _h("a",{staticClass:"brand-logo center",attrs:{href:"#!"}})},function(){with(this)return _h("a",{staticClass:"dropdown-button hide-on-large-only",attrs:{href:"#!","data-activates":"dropdown1"}},[_h("i",{staticClass:"material-icons",attrs:{style:"margin-left:10px;"}},["menu"])," ",_h("i",{staticClass:"mdi-navigation-arrow-drop-down right"})])}]}},3:function(t,a,e){var i,s;i=e(9);var r=e(10);s=i=i||{},"object"!=typeof i["default"]&&"function"!=typeof i["default"]||(s=i=i["default"]),"function"==typeof s&&(s=s.options),s.render=r.render,s.staticRenderFns=r.staticRenderFns,t.exports=i},9:function(t,a,e){"use strict";a["default"]={props:{islogin:{type:Boolean,"default":function(){return!1}},baseurl:{type:String,"default":function(){return""}}},methods:{isURL:function(t){if(window.location.pathname==t)return!0},path:function(t){return this.baseurl+t}},data:function(){return{}},mounted:function(){document.getElementById("loading-nav").remove()}}}});