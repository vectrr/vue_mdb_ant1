<template>
  <Layout>
    <div style="margin-top: 85px; overflow-x: hidden;">
       
           
    <mdb-container >
        <mdb-row>
          <mdb-col md="12" class="mx-auto white z-depth-1 py-2 px-2">
            <h1 class="pb-4"><b>Our recommendations from your answers</b></h1>
          </mdb-col>
        </mdb-row>
        <br/>
        <br/>
        <mdb-row class=" mx-auto mRow" >
          <mdb-col md="6" class="mx-auto  white mCard">  
            <mdb-card>
                <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
                <mdb-card-body>
                <mdb-card-text>Key membership at medium risk/return</mdb-card-text>
                <mdb-btn color="primary">CHOOSE GUARDIAN</mdb-btn>
                </mdb-card-body>
            </mdb-card>
          </mdb-col>
          
          <mdb-col md="6" class="mx-auto  white mCard">  
            <mdb-card>
                <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
                <mdb-card-body>
                <mdb-card-title>Basic card</mdb-card-title>
                <mdb-card-text>SBeginner membership for certified investors at high risk/return</mdb-card-text>
                <mdb-btn color="primary">CHOOSE PRIME ANALYTICS</mdb-btn>
                </mdb-card-body>
            </mdb-card>
          </mdb-col>
        </mdb-row>

        
        <mdb-row class=" mx-auto mRow" >     
            
        </mdb-row>

      </mdb-container>
  
     </div>
    <!-- <mlist :posts="posts" /> -->
   
  </Layout>
</template>

<script>

import { mdbContainer, mdbCol, mdbRow,   mdbCard, mdbCardImage, mdbCardBody, mdbCardTitle, mdbCardText, mdbBtn  } from 'mdbvue';


export default {
  components: {
    
    mdbContainer,
    mdbCol,
    mdbRow,
    mdbCard,
    mdbCardImage,
    mdbCardBody,
    mdbCardTitle,
    mdbCardText,
    mdbBtn,
    
  },
  

  data() {
    return {
      posts: [],
    }
  },
  mounted() {
    this.fetchNews()
  },

}
</script>


<style>
    .mCard {
        max-width: 400px;
    }
    .mRow {
        max-width: 875px;
    }
</style>