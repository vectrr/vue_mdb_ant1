<template>
  <MDBListGroup>
    <!-- <MDBListGroupItem v-for="(item,index) in sm1" :key="index"  tag="a" href="#" action active>{{item.name}}</MDBListGroupItem> -->
    <MDBListGroupItem  tag="a" href="#" action active>zzz</MDBListGroupItem>
  </MDBListGroup>
</template>

<script>
  import { MDBListGroup, MDBListGroupItem } from "mdb-vue-ui-kit";

  export default {
       data() {
  return {
       sm1:[],
  }},
    components: {
      MDBListGroup,
      MDBListGroupItem
    },
    mounted() {
    this.sm1=this.post;
  },
  };
</script>