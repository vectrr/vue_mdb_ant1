<template>
     <div class="mTopu" style="max-width: 990px;
    margin-left: auto;
    margin-right: auto;
    margin-top: -200px;
    width: 90%;">
       <md-card class="md-small-size-100" style="margin-left: auto;
    margin-right: auto;width:99%;max-width:990px;box-shadow: 0px 8px 22px #00000036;">
         <md-card-header>
          <div class="md-title text-center">Products</div>
        </md-card-header>

        <md-card-content>
          <div data-v-320224c2="" data-v-40b8d964="" class="row" data-v-35ea163e="" style="padding-left:1px;padding-right:1px;width:99%;max-width:900px;" id="div2">

        <item v-for="(post, index) in posts" :key="index" :post="post" @removeItem="removeItem" />
        
          </div>
        </md-card-content>
         </md-card>


      
  </div>
</template>

<script>
import item from "./item.vue"

export default {
  props: {
    posts: {
      type: Array,
      required: true,
    },
  },
  methods:{
    removeItem(){
      console.log("r2");
      
      this.$emit("reload");
      
    },  
 
  
  },
  components: {
    item,
  },
}
</script>

<style>
#div2{
width: 100%; max-width: 1100px; padding: 22px;margin-top: 20px; margin-right: auto; margin-left: auto;  box-shadow: 0px 8px 22px #00000036;
}
</style>