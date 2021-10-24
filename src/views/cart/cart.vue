<template>
  <Layout>
    
   <div style="margin-top: -15px; overflow-x: ;">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
       <mdb-edge-header color="" style="background-color: #080e35 ">
        <div class="home-page-background"></div>
      </mdb-edge-header>
          
     </div>
         <md-card class="md-small-size-100" style="margin-left: auto;
    margin-right: auto;width:99%;max-width:1100px;box-shadow: 0px 8px 22px #00000036;">


       
          <mlist :posts="products" :key="list_key"  @reload="reload" :cid="cid" />
        <upload :cid="cid" />
         </md-card>
    
   
   
  </Layout>
</template>

<script>
import upload from "./upload.vue"
// import upload from "../contact/form.vue"
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
  

  props: ['cid'],
  data() {
    return {
       top:30,
       top1:50,
      products: [],
      sending: false, 
       list_key:0,
       p:null,
    }
  },
  methods: {
    
    mSearchitem(id){
     
        this.sending = true
        var murl=this.$store.state.mUrl;
    
          const article = { 
              cid:id 
          };
          
      console.log("form_data: "+JSON.stringify(article));
      axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=s_cart',
          data: article,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        this.sending = false
        // console.log("response: "+ JSON.stringify(response));
        console.log("response2: "+ JSON.stringify(response.data.d.p));
       
    if(response.data.val==1){ 
            // this.emsg = response.data.message;
            this.p=response.data.d.p;
              this.fetchNews();
           
          }
      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });
        // Instead of this timeout, here you can call your API
      //  this.sending = false
    },
       reload(){
      console.log("reloading...");
      // this.list_key=this.list_key+1;
       this.refresh();
          
      
        this.products=[];
        setTimeout(() => this.fetchNews(),this.$parent.add2cart(), 500);
       
    },
      refresh(){
      console.log("refreshing...");
      this.list_key=this.list_key+1;
    },
    // Helper function for extracting a nested image object
   onCollapse(collapsed, type) {
      console.log(collapsed, type);
    },
    onBreakpoint(broken) {
      console.log(broken);
    },
     fetchNews() {
       const p=this.p;
        console.log("p...."+p);
        this.sending=true;
        var murl=this.$store.state.mUrl;
    
        var mCarray=[];
    
      if(this.$cookies.isKey("mp")||p!=null){
          // mp=this.$cookies.get("mp");
          if(p!=null){
            mCarray=JSON.parse(p);
          }else{

           mCarray=JSON.parse(this.$cookies.get("mp"))
          }
            console.log("m= "+mCarray);
     
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
  
    if(this.cid!="" && this.cid!=undefined){
      console.log("url ok="+this.cid)
      this.mSearchitem(this.cid);
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
    background-color: #fff;

}
.ant-affix{
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%) ;
}

</style>