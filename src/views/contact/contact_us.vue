<template>
  <Layout>
    <div style="margin-top: -15px; overflow-x: ;">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
       <mdb-edge-header color="" style="background-color: #080e35 ">
        <div class="home-page-background"></div>
      </mdb-edge-header>
          
     </div>
    <fom  />
   
  </Layout>
</template>

<script>
import fom from "./form.vue"
// import axios from "axios"
import {  mdbEdgeHeader,  } from 'mdbvue';
// import data from "./posts.json"

export default {
  components: {
    // Layout,
    // NewsFilter,

    fom,
    mdbEdgeHeader,
    // mdbInput,
    // mdbCardBody
  },

  data() {
    return {
       top:30,
       top1:50,
      products: [],
      sending: false,
    }
  },
  methods: {
    
    // Helper function for extracting a nested image object
   onCollapse(collapsed, type) {
      console.log(collapsed, type);
    },
    onBreakpoint(broken) {
      console.log(broken);
    },
  },
    mounted() {
    if(this.mCarray!="" && this.mCarray!=undefined){
      console.log("url ok="+this.name)
      this.mSearchitem(this.name);
    }else{
      
    this.fetchNews()
      console.log("url not ok")
    }
  },


}
</script>

<style scoped>

 .mDiv{
    background-color: #fff;
   padding-top: 3px;
    padding-left: 3px;
 }
.md-form {
  
    /* border-radius: 30px; */
    background-color: rgb(230, 8, 8);

}
.ant-affix{
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%) ;
}
</style>