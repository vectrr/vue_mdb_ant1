<template>
<div data-v-5e2edc68="" data-v-40b8d964="" class="mb-5 col-md-4" data-v-320224c2="" v-if="post.name">
    
     <mdb-card wide>
		<mdb-view hover cascade>
        <a-carousel effect="fade" arrows>
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
    <div>
      <a href="#!">
				<mdb-card-image src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg" alt="Card image cap" ></mdb-card-image>
				<mdb-mask flex-center waves overlay="white-slight"></mdb-mask>
			</a>
      </div>
    <div>
      <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap" ></mdb-card-image>
				<mdb-mask flex-center waves overlay="white-slight"></mdb-mask>
    </div>
    <div><h3>4</h3></div>
  </a-carousel>
			
		</mdb-view>
		<mdb-card-body class="text-center pb-0" cascade>
			<mdb-card-title><strong>Alison Belmont</strong></mdb-card-title>
			<mdb-card-text>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</mdb-card-text>
			<mdb-card-footer class="text-muted mt-4">2 days ago</mdb-card-footer>
		</mdb-card-body>
	</mdb-card>
 <mdb-card>
    <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
    <mdb-card-body>
      <mdb-card-title>Basic card</mdb-card-title>
      <mdb-card-text>Some quick example text to build on the card title and make up the bulk of the card's content.</mdb-card-text>
      <mdb-btn color="primary">Button</mdb-btn>
    </mdb-card-body>
  </mdb-card>
            <mdb-card v-animateOnScroll="{animation: 'fadeInLeft', delay: 30}">
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
            </mdb-card>
     
    <!-- <div data-v-ec246eba="" data-v-40b8d964="" class="animated fadeInLeft card" data-v-5e2edc68="" style="padding:0px">
        
            <div data-v-9645230c="" data-v-40b8d964="" class="card-body" data-v-ec246eba="" >
                <h4 data-v-6dbf9a14="" data-v-40b8d964="" class="card-title" data-v-9645230c="" style="background-color: rgb(9, 20, 29);color: white;">
                    
                    <strong data-v-40b8d964="" data-v-6dbf9a14=""> {{ post.name }}</strong>
                    </h4>
                    
                    <p style="float:left">Occupation: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c=""  v-if="post.occupation !== null">{{ post.occupation }}</h5>
                    <br/>
                    <p style="float:left">Email: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.email }}</h5>
                    <br/>
                    <p style="float:left">Bio: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.bio }}</h5>
                    <br/>
                    <p style="float:left">created_at: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.created_at }}</h5>
                    <br/>
                    <p style="float:left">updated_at: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c="">{{ post.updated_at }}</h5>
                    
                </div>
    </div> -->

        </div>
</template>

<script>
import {  mdbBtn, mdbCard, mdbCardTitle, mdbCardText, mdbCardBody,mdbView,mdbMask, mdbCardImage,
			mdbCardFooter, animateOnScroll} from 'mdbvue';
export default {
   name: 'HomePage',
  components: {

mdbBtn,
mdbCard,
mdbCardTitle,
mdbCardText,
mdbCardBody,

			mdbView,
			mdbMask,
			mdbCardImage,
			mdbCardFooter,
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
    isBold: false,
    
  }
},

}
</script>
<style scoped>

/* For demo */
.ant-carousel >>> .slick-slide {
  text-align: center;
  height: 160px;
  line-height: 160px;
  background: #364d79;
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
</style>