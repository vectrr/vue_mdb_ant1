<template>
  <Layout>
    <div style="margin-top: -15px; overflow-x: ;">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
       <mdb-edge-header color="" style="background-color: #080e35 ">
        <div class="home-page-background"></div>
      </mdb-edge-header>
           
    <mdb-container class="free-bird">
        <mdb-row>
          <mdb-col md="10" class="mx-auto white z-depth-1 py-2 px-2" >
            
          <h3  style="text-align: center;"><strong>Motocycles</strong></h3>
          <a-affix :offset-top="top"  >
            <!-- <div style="" class="mDiv">
              <mdb-input label="Search" v-model="value"  />
            </div> -->
            <input class="form-control search_input dProperty mDiv" id="search" style="border-radius: 50px 50px;max-width: 400px;text-align:left;margin-left: auto;margin-right: auto;padding-left:32px;cursor:text; box-shadow:12px 12px 12px black;box-shadow: 1px 6px 14px 6px #09131596;margin-bottom:33px" type="search" placeholder="Search motocycle" aria-label="Search"  v-on:keyup="keymonitor"/>
                <!-- {{mItems}} -->
                <mdb-icon icon="sync-alt"  class="refresh-start"/>
           

  <mdb-list-group v-if="dList">
    <div style="margin-top: -52px;box-shadow: rgb(9 19 21 / 59%) 1px 6px 14px 6px;max-width: 410px;
    margin-left: auto;
    margin-right: auto;
    width: 80%;">
    <mdb-list-group-item  :action="true"  v-for="(item,index) in mItems" :key="index"   ><div @click="mSearchitem(item.name)">{{item.name}}</div ></mdb-list-group-item>
    </div>
  </mdb-list-group>   

  <mdb-list-group v-if="cRequest">
    <div style="margin-top: -52px;box-shadow: rgb(9 19 21 / 59%) 1px 6px 14px 6px;max-width: 410px;
    margin-left: auto;
    margin-right: auto;
    width: 80%;">
    <mdb-list-group-item  :action="true" href="#" tag="a">Make request for this product?</mdb-list-group-item>
    </div>
  </mdb-list-group>

    <!-- <mylist :posts="mItems" /> -->
          </a-affix>

        <!-- <a-affix :offset-top="top1" :style="{left: 200}">
           <div style="" class="mDiv">
          <a-layout-sider 
            breakpoint="lg"
            collapsed-width="0"
            @collapse="onCollapse"
            @breakpoint="onBreakpoint"
          >
         
            <div class="mDiv logo" />
            <mdb-input label="Search" v-model="value"  />
       
          </a-layout-sider>
             </div>
        </a-affix> -->
          </mdb-col>
        </mdb-row>
      </mdb-container>
  
     </div>
    <mlist :posts="products" :key="list_key" />
   
  </Layout>
</template>

<script>
import mlist from "./list.vue"
// import mylist from "./mList.vue"
import axios from "axios"
import { mdbContainer, mdbCol, mdbRow,  mdbEdgeHeader, mdbListGroup,mdbListGroupItem,mdbIcon } from 'mdbvue';
// import data from "./posts.json"

export default {
  components: {
    // Layout,
    // NewsFilter,
    // mylist,
      mdbListGroup,
      mdbListGroupItem,
    mlist,
    mdbContainer,
    mdbCol,
    mdbRow,
    mdbEdgeHeader,
    mdbIcon,
    // mdbInput,
    // mdbCardBody
  },
  

  data() {
    return {
       top:50,
       top1:50,
      products: [],
      mItems: [],
      sending: false,
      dList:false,
      cRequest:false,
      list_key:0,
    }
  },
  methods: {
    refresh(){
      console.log("refreshing...");
      this.list_key=this.list_key+1;
    },
     keymonitor: function(event) {
     
        console.log(event.target.value);
        if(event.target.value!= ""){

        this.mSearch(event.target.value);
        
        }else{
           this.mItems=[]; 
           this.dList=false;
        }
    },
    
   async mSearchitem (s){
      
      //  console.log("clicked: mSearchitem"+ s)

           this.dList=false;
        this.sending=true;
        var murl=this.$store.state.mUrl;
       const mData = { 
          nm:s,
            // pass:this.pass
        };
    
      axios({
          method: 'POST',
          url: murl+'api.php?apicall=a_m1',
          data: mData,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
         const results = response.data
         const myData = response.data.data
        // console.log("response: "+JSON.stringify(response));
        console.log("response2: "+ JSON.stringify(myData));
        
        if(results.val==2){
          console.log(myData)
            this.products=[]
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
        this.refresh();
        }
       this.sending=false;

      })
      .catch(function (response) {
        this.sending=false;
          //handle error
          console.log("error"+response)
      });

    },
    mSearch (s){
      
        this.sending=true;
        var murl=this.$store.state.mUrl;
    const mData = { 
              search:s ,
              };
    axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=a_search',
          data: mData,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
         const results = response.data
         const myData = response.data.data
        // console.log("response: "+JSON.stringify(response));
        console.log("response1: "+ JSON.stringify(myData));
        
        if(results.val==2){
           this.cRequest=false;
          console.log(myData)
           this.mItems = myData.map(post => ({
             name:post.name
           }))
           
           this.dList=true;
        }else if(results.val==0){
           
           
           this.dList=false;
           this.cRequest=true;
        }
       this.sending=false;

      })
      .catch(function (response) {
        this.sending=false;
          //handle error
          console.log("error"+response)
      });

    },
     add2cart(){
      console.log("mtocycles");
     
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
       const mData = { 
          nm:"peter" ,
            // pass:this.pass
        };
    
      axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=a_m',
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

      // try {
      //   const url = "https://ti-react-test.herokuapp.com/users"
      //   const response = await axios.get(url)
      //     console.log("Server Error:", response.data)
      //   const results = response.data
      //   this.posts = results.map(post => ({
      //     id: post.id,
      //     name: post.name,
      //     occupation: post.occupation,
      //     email: post.email,
      //     bio: post.bio,
      //     created_at: post.created_at,
      //     updated_at: post.updated_at
         
      //   }))
      // } catch (err) {
      //   if (err.response) {
      //     // client received an error response (5xx, 4xx)
      //     console.log("Server Error:", err)
      //   } else if (err.request) {
      //     // client never received a response, or request never left
      //     console.log("Network Error:", err)
      //   } else {
      //     console.log("Client Error:", err)
      //   }
      // }
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
@keyframes rotate {

from {transform: rotate(0deg)}
to {transform: rotate(360deg)}

}


.refresh-start {

animation-name: rotate;
animation-duration: 1s;
animation-iteration-count: infinite;
animation-timing-function: linear;
animation-play-state: running;

}
</style>