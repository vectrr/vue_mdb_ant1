<template>
<div data-v-5e2edc68="" data-v-40b8d964="" class="mb-5 col-md-6" data-v-320224c2="" v-if="post.name">

  <mdb-modal  size="lg" :show="modal" @close="modal = false" class="ms2">
      <mdb-modal-header>
        <mdb-modal-title>{{post.name }}</mdb-modal-title>
      </mdb-modal-header>
   
        <slider ref="slider" :options="options">
          <slideritem v-for="(item,index) in sm1" :key="index" > 
            <div>
                <img  :src="murl+item.loc" alt="Card image cap" />
            </div>
          </slideritem>
          <div slot="loading">loading...</div>
        </slider>
          <!-- <a-carousel effect="slide" arrows id="ms2" class="ms2">
            <div
              slot="prevArrow"
              class="custom-slick-arrow"
              style="left: 10px;zIndex: 1"
            >
              <a-icon type="left-circle" />
            </div>
            <div slot="nextArrow"  class="custom-slick-arrow" style="right: 10px">
              <a-icon type="right-circle" />
            </div>
          
            <div  v-for="(item,index) in sm1" :key="index" style="height:10%"  >
              <img  :src="murl+item.loc" alt="Card image cap" class="ms1"/>
            </div>
          </a-carousel> -->
     
      <mdb-modal-footer>
        <mdb-btn color="danger" @click.native="modal = false">Close</mdb-btn>
    
      </mdb-modal-footer>
    </mdb-modal>

 <!-- <div style="width:100%;margin:20px auto;height:400px">

      <slider ref="slider" :options="options">
          
          <slideritem v-for="(item,index) in someList" :key="index" :style="item.style"> 
				<mdb-card-image :src="item.html" alt="Card image cap" ></mdb-card-image>
            </slideritem>
          
          <div slot="loading">loading...</div>
      </slider>
 </div> -->


     <mdb-card v-animateOnScroll="{animation: 'fadeInLeft', delay: 30}" wide>
		<mdb-view hover cascade class="ms">
        <a-carousel effect="slide" arrows  >
    <div
      slot="prevArrow"
      class="custom-slick-arrow"
      style="left: 10px;zIndex: 1"
    >
      <a-icon type="left-circle" />
    </div>
    <div slot="nextArrow"  class="custom-slick-arrow" style="right: 10px">
      <a-icon type="right-circle" />
    </div>
  
    <div  v-for="(item,index) in sm1" :key="index"  >
      <img  :src="murl+item.loc" alt="Card image cap" class="ms1"/>
				<mdb-mask flex-center waves overlay="white-slight"></mdb-mask>
    </div>
  </a-carousel>
			<!-- <slider ref="slider" :options="options">
         
          <slideritem v-for="(item,index) in someList" :key="index" > 
         <div>
      <mdb-card-image  :src="item.html" alt="Card image cap" ></mdb-card-image>
				<mdb-mask flex-center waves overlay="white-slight"></mdb-mask>
    </div>
            </slideritem>
          
          <div slot="loading">loading...</div>
      </slider> -->
       
       
		</mdb-view>
		<mdb-card-body class="text-center pb-0" cascade>
     
   <p style="text-align: center;float:left"><b>{{post.name }}</b></p>   
<p style="text-align: center;"><b>Price: </b> {{post.price }}</p>
        <!-- <h4><b>Description</b></h4> -->
        <p>{{post.description}}</p>
   
			<!-- <mdb-card-title></mdb-card-title> -->
			<!-- <mdb-card-footer class="text-muted mt-4">2 days ago</mdb-card-footer> -->
		</mdb-card-body>
    
       <div  style="margin-left: auto;margin-right: auto;">
         <mdb-btn  color="primary" rounded style="float:left" @click.native="modal = true">preview</mdb-btn>
       <mdb-btn  color="primary" rounded style="float:">Purchase</mdb-btn>
       </div>
	</mdb-card>
 <!-- <mdb-card>
    <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
    <mdb-card-body>
      <mdb-card-title>Basic card</mdb-card-title>
      <mdb-card-text>Some quick example text to build on the card title and make up the bulk of the card's content.</mdb-card-text>
      <mdb-btn color="primary">Button</mdb-btn>
    </mdb-card-body>
  </mdb-card> -->
            <!-- <mdb-card v-animateOnScroll="{animation: 'fadeInLeft', delay: 30}">
              <mdb-card-body>
                <mdb-card-title>
                  <strong> {{ post.name }}</strong>
                  </mdb-card-title>
                <mdb-card-text>
                  
                    <p style="float:left">description: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c=""  v-if="post.description !== null">{{ post.description }}</h5>
                    <br/>
                    <p style="float:left">Email: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.email }}</h5>
                    <br/>
                    <p style="float:left">Bio: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.bio }}</h5>
                    
                </mdb-card-text>
                <router-link :to="'/post/' + post.id+ '/'+post.name + '/'+post.occupation+ '/' +post.email+ '/' +post.bio + '/edit'" class="float-right"><mdb-btn color="elegant">CLick to Edit</mdb-btn></router-link>
              </mdb-card-body>
            </mdb-card> -->
     
    

        </div>
</template>

<script>
import {   mdbCard, mdbCardBody,mdbView,mdbMask, animateOnScroll, mdbBtn,
mdbModal,
      mdbModalHeader,
      mdbModalTitle,
      // mdbModalBody,
      mdbModalFooter,} from 'mdbvue';
      
import { slider, slideritem } from 'vue-concise-slider'
export default {
   name: 'HomePage',
  components: {
mdbModal,
      mdbModalHeader,
      mdbModalTitle,
      // mdbModalBody,
      mdbModalFooter,
  mdbBtn,
  mdbCard,
  // mdbCardTitle,
  // mdbCardText,
  mdbCardBody,
  mdbView,
  mdbMask,
  // mdbCardImage,
  // mdbCardFooter,
  slider,
  slideritem
  },  directives: {
    animateOnScroll
  },
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
  data() {
  return {
    modal: false,
    isBold: false,
     murl:this.$store.state.mUrl,
     sm1:[],
    someList:[
          {
            html: "https://mdbootstrap.com/img/Photos/Others/photo6.jpg",
            style: {
              'background': '#1bbc9b'
            }
          },
          {
            html: 'https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg',
            style: {
              'background': '#4bbfc3'
            }
          },
          {
            html: '../../files',
            style: {
              'background': '#7baabe'
            }
          }
        ],
        //Slider configuration [obj]
        options: {
          currentPage: 0,
          effect:'slide',
          // thresholdDistance: 500,
          // thresholdTime: 100,
          // autoplay:3000,
          loop:true,
          // preventDocumentMove:true
          // // direction:'vertical',
          // loopedSlides:1,
          // slidesToScroll:1
        }
    
  }
},
  methods: {
 currency(){
  // Create our number formatter.
var formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'Ksh',

  // These options are needed to round to whole numbers if that's what you want.
  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

// console.log(this.post.price)
this.post.price= formatter.format(this.post.price);
}
  },
  mounted() {
    // this.fetchNews()
    this.currency();
    this.sm1=this.post.im;
    // console.log(JSON.stringify(this.post.im))
  },
}
</script>
<style scoped>
.card{
  width: 100%;
}
.ms{
      box-shadow: 0 5px 11px 0 rgb(0 0 0 / 18%), 0 4px 15px 0 rgb(0 0 0 / 15%);
    /* margin-left: -22px;
    margin-right: -22px; */
    /* margin-top: 22px; */
    margin-bottom: 22px;
    background-color: #e9ecef;
}
.ms2{
  /* max-width: 1340px;
    width: 100%;
    max-width: 100%;
    height: 2222px; */
    /* max-height: 234px; */
    
    margin-left: auto;
    margin-right: auto;
}
.ms1{
  /* max-width: 340px;
    width: 100%; */
    max-width: 100%;
    /* height: 2222px; */
    max-height: 234px;
    
    margin-left: auto;
    margin-right: auto;
}

#ms2 .ant-carousel >>> .slick-slide {
  text-align: center;
  height: 30px;
  /* max-height: 360px; */
  /* height: 70%; */
  line-height: 160px;
  background: #02050a;
  overflow: hidden;
}
/* For demo */
.ant-carousel >>> .slick-slide {
  text-align: center;
  height: 230px;
  /* max-height: 360px; */
  /* height: 70%; */
  line-height: 160px;
  background: #02050a;
  overflow: hidden;
}

.ant-carousel >>> .custom-slick-arrow {
  width: 25px;
  height: 25px;
  font-size: 25px;
  color: #fff;
  background-color: rgba(31, 45, 61, 0.11);
  opacity: 0.3;
}
.ant-carousel >>> .custom-slick-arrow:before {
  display: none;
}
.ant-carousel >>> .custom-slick-arrow:hover {
  opacity: 0.5;
}

.ant-carousel >>> .slick-slide h3 {
  color: #fff;
}
.ant-carousel .slick-dots li{
background-color: aqua;
}
.card .card-body{
    margin-top: -32px;
    font-family: Arial, Helvetica, sans-serif;
}
</style>