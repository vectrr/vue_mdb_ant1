<template>
  <Layout>
    <div style="margin-top: -15px; overflow-x: ;">
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
       <mdb-edge-header color="" style="background-color: #080e35 ">
        <div class="home-page-background"></div>
      </mdb-edge-header>
           
    <mdb-container class="free-bird">
        <mdb-row>
          <mdb-col md="10" class="mx-auto white z-depth-1 py-2 px-2">
            
          <h3  style="text-align: center;"><strong>Motocycles</strong></h3>
          <a-affix :offset-top="top"  >
            <!-- <div style="" class="mDiv">
              <mdb-input label="Search" v-model="value"  />
            </div> -->
            <input class="form-control search_input dProperty mDiv" id="search" style="border-radius: 50px 50px;max-width: 400px;text-align:left;margin-left: auto;margin-right: auto;padding-left:32px;cursor:text; box-shadow:12px 12px 12px black;box-shadow: 1px 6px 14px 6px #09131596;margin-bottom:33px" type="search" placeholder="Search motocycle" aria-label="Search"  v-on:keyup="keymonitor">
                
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
    <mlist :posts="products" />
   
  </Layout>
</template>

<script>
import mlist from "./list.vue"
import axios from "axios"
import { mdbContainer, mdbCol, mdbRow,  mdbEdgeHeader,  } from 'mdbvue';
// import data from "./posts.json"

export default {
  components: {
    // Layout,
    // NewsFilter,
    mlist,
    mdbContainer,
    mdbCol,
    mdbRow,
    mdbEdgeHeader,
    // mdbInput,
    // mdbCardBody
  },
  

  data() {
    return {
       top:50,
       top1:50,
      products: [],
      sending: false,
    }
  },
  methods: {
     keymonitor: function(event) {
        console.log(event.target.value);
        
        this.sending=true;
        var murl=this.$store.state.mUrl;
    const mData = { 
              search:event.target.value ,
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
          console.log(myData)
           
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
</style>