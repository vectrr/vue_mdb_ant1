<template>
<div data-v-5e2edc68="" data-v-40b8d964="" class="mb-5 col-md-4" data-v-320224c2="" v-if="post.name">
    
     

            <mdb-card v-animateOnScroll="{animation: 'fadeInLeft', delay: 30}">
              <mdb-card-body>
                <mdb-card-title>
                  <strong> {{ post.name }}</strong>
                  </mdb-card-title>
                <mdb-card-text>
                  
                    <p style="float:left">Occupation: </p>
                    <h5 data-v-4e623858="" data-v-40b8d964="" class="card-text" data-v-9645230c=""  v-if="post.occupation !== null">{{ post.occupation }}</h5>
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
import {  mdbBtn, mdbCard, mdbCardTitle, mdbCardText, mdbCardBody, animateOnScroll} from 'mdbvue';
export default {
   name: 'HomePage',
  components: {

mdbBtn,
mdbCard,
mdbCardTitle,
mdbCardText,
mdbCardBody
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