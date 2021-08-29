<template>
   <div style="margin-top: -15px; overflow-x: hidden;">
       <mdb-edge-header color="teal darken-2">
        <div class="home-page-background"></div>
      </mdb-edge-header>
           
    <mdb-container class="free-bird">
        <mdb-row>
          <mdb-col md="10" class="mx-auto white z-depth-1 py-2 px-2">
            <mdb-card-body>
              <h2 class="pb-4"><strong>Edit page</strong></h2>
              
           
            </mdb-card-body>
          </mdb-col>
        </mdb-row>
      </mdb-container>

  <div data-v-320224c2="" data-v-40b8d964="" data-v-35ea163e="" style="" id="div1" >
      <router-link :to="'/'">
  <md-button class="md-raised md-primary" >back</md-button>
      </router-link>

    <md-field>
      <label>Name  </label>
      <md-input v-model="name" ></md-input>
    </md-field>

    <md-field>
      <label>Email</label>
      <md-input type="email" v-model="email"></md-input>
    </md-field>
    <md-field>
      <label>Occupation</label>
      <md-input v-model="occupation"></md-input>
    </md-field>

    <md-field>
      <label>Bio</label>
      <md-textarea v-model="bio" md-autogrow></md-textarea>
    </md-field>
    <mdb-btn color="elegant" v-on:click="submit">Submit</mdb-btn>

  </div>
      <mdb-modal :show="successful" @close="successful = false" success>
      <mdb-modal-header>
        <mdb-modal-title>Success </mdb-modal-title>
        </mdb-modal-header>
        <mdb-modal-body  class="text-center">
          <mdb-icon icon="check" size="4x" class="mb-3 animated rotateIn"/>
          <p>Changes have been successfully made.
          </p>
        </mdb-modal-body>
        <mdb-modal-footer center>
          <mdb-btn color="success" @click.native="successful = false">close<mdb-icon icon="diamond" class="ml-1" color="white"/></mdb-btn>
         
        </mdb-modal-footer>
      </mdb-modal>

        <mdb-modal :show="danger" @close="danger = false" danger>
      <mdb-modal-header>
        <mdb-modal-title>Danger Modal</mdb-modal-title>
      </mdb-modal-header>
      <mdb-modal-body>
       <p>{{msg}}</p>
      </mdb-modal-body>
      <mdb-modal-footer center>
        <mdb-btn color="danger" @click.native="danger = false">close<mdb-icon icon="diamond" class="ml-1" color="white"/></mdb-btn>
   
      </mdb-modal-footer>
    </mdb-modal>

  </div>
</template>



<script>
import axios from "axios"

import {mdbIcon, mdbContainer, mdbCol, mdbRow,  mdbEdgeHeader,  mdbCardBody,mdbBtn,mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter, } from 'mdbvue';
export default {
    components:{
      mdbIcon,
    mdbContainer,
    mdbCol,
    mdbRow,
    mdbEdgeHeader,
    mdbBtn,
    mdbCardBody,
    mdbModal, 
    mdbModalHeader,
    mdbModalTitle,
    mdbModalBody,
    mdbModalFooter
  },
    props: ['postId','postName','postEmail','postBio','postOccupation'],

    data() {
  return {
     name:this.postName,
     email:this.postEmail,
     occupation:this.postOccupation,
     bio:this.postBio,
     successful: false,
     
     danger:false,
     msg:""
  }
},

      methods: {
        
 validateEmail: function(email) {
    // The view model.
  
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  // eslint-disable-line
  return re.test(email);
},
    submit: function () {
        var context = this;
      if( !this.name && !this.occupation && !this.bio && !this.email){
        context.msg="The form is empty"
        context.danger=true  
        // alert("The form is empty")
         }else if(!this.validateEmail(this.email)){
      // alert("invalid email")
      this.msg="Invalid email"
        context.danger=true  
         }else{

  
        axios.patch('https://ti-react-test.herokuapp.com/users/' + this.postId, { 
         name: this.name , 
         occupation: this.occupation, 
         bio: this.bio, 
         email: this.email,
         _method: 'patch'   
    })
    .then(function (response) {
        // this.first=alerttrue

         console.log(response.statusText);
         if(response.statusText=="OK"){
           context.successful=true
            //  alert("edited successfully")
         }
    })
    .catch(function (error) {
         console.log(error); 
         context.msg="There was an error submiting changes"
         context.danger=true  
          // alert("Error please make sure you have filled the form correctly")         
    });
   
      }
    }
  },
  

}
</script>
<style>
#div1{
width: 90%; max-width: 700px; padding: 22px; margin-top:57px;margin-right: auto; margin-left: auto;  box-shadow: 0px 8px 22px #00000036;
}
</style>
