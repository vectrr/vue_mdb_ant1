<template>
  <Layout>
    <div style="margin-top: -15px; overflow-x: ;">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
       <mdb-edge-header color="" style="background-color: #080e35 ">
        <div class="home-page-background"></div>
      </mdb-edge-header>
          
     </div>
    <mlist :posts="products" />
    <upload />
   
  </Layout>
</template>

<script>
import upload from "./upload.vue"
import mlist from "./list.vue"
import axios from "axios"
import {  mdbEdgeHeader,  } from 'mdbvue';
// import data from "./posts.json"

export default {
  components: {
    // Layout,
    // NewsFilter,
    upload,
    mlist,
    // mdbContainer,
    // mdbCol,
    // mdbRow,
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
     add2cart(){
      console.log("cart");
       this.products=[];
      this.fetchNews();
      this.$parent.add2cart();
    },
    // Helper function for extracting a nested image object
   onCollapse(collapsed, type) {
      console.log(collapsed, type);
    },
    onBreakpoint(broken) {
      console.log(broken);
    },
    async fetchNews() {
        this.sending=true;
        var murl=this.$store.state.mUrl;
    
     var mCarray=[];
    
      if(this.$cookies.isKey("mp")){
          // mp=this.$cookies.get("mp");
           mCarray=JSON.parse(this.$cookies.get("mp"))

      
        const mData = { 
          mc:mCarray,
        }; 
axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=a_cart',
          data: mData,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
         const results = response.data
         const myData = response.data.data
        // console.log("response: "+JSON.stringify(response));
        console.log("response1: "+ JSON.stringify(myData));
        
        if(results.val==2){
          console.log(myData)
            this.products = myData.map(post => ({
            
          id: post.pro.pid,
          name: post.pro.name,
          images: post.pro.img,
          description: post.pro.description,
          type: post.pro.type,
          price: post.pro.price,
          im: post.im
          // created_at: post.name,
          // updated_at: post.name
         
        }))
        }
       this.sending=false;

      })
      .catch(function (response) {
        this.sending=false;
          //handle error
          console.log("error"+response)
      });
}  
    },
  },
  mounted() {
    this.fetchNews()
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
    background-color: #fff;

}
.ant-affix{
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%) ;
}
</style>