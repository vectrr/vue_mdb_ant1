<template>
  <div class="mTop">

  <a-layout id="components-layout-demo-responsive">
    <a-affix :offset-top="top" class="mTop">
    <a-layout-sider 
    
      breakpoint="lg"
      collapsed-width="0"
      @collapse="onCollapse"
      @breakpoint="onBreakpoint"
    >
      <div class="logo" />
      <a-menu theme="dark" mode="inline" :default-selected-keys="['3']">
        <a-menu-item key="1" @click="mChange1">
          <a-icon type="user" />
          <span class="nav-text">Motocycle</span>
        </a-menu-item>
        <a-menu-item key="2" @click="mChange2">
          <a-icon type="tool" />
          <span class="nav-text">Spare parts</span>
        </a-menu-item>
        <a-menu-item key="3" @click="mChange3">
          <a-icon type="upload" />
          <span class="nav-text">Upload</span>
        </a-menu-item>
      </a-menu>
    </a-layout-sider>
    </a-affix>
    <a-layout class="mTop">
      <!-- <a-layout-header :style="{ background: '#fff', padding: 0 }" /> -->
      <a-layout-content :style="{ margin: '54px 16px 0' }">
        <div :style="{ padding: '24px', background: '#fff', minHeight: '360px' }">
           <mOto     v-if="mProduct === 1"/>
           <mSpare v-if="mProduct === 2" />
           <mUpload v-if="mProduct === 3" />
        </div>
      </a-layout-content>
      <!-- <a-layout-footer style="textAlign: center">
        Ant Design ©2018 Created by Ant UED
      </a-layout-footer> -->
    </a-layout>
  </a-layout>
    <div style="width: 100%">
    <!-- <a-affix :offset-top="top">
      <div style="background-color:#001529;height:63px;margin-top:-50px;" ></div>
       <md-progress-bar md-mode="indeterminate" v-if="sending" />
         <div style="width: 256px">
        <a-button type="primary" style="margin-bottom: 16px"  @click="toggleCollapsed">
        <a-icon :type="collapsed ? 'menu-unfold' : 'menu-fold'" />
        </a-button>
        <a-menu
        :default-selected-keys="['1']"
       
        mode="inline"
        theme="dark"
        :inline-collapsed="collapsed"
        >
        <a-menu-item key="1">
            <a-icon type="pie-chart" />
            <span>Motocycles</span>
        </a-menu-item>
        <a-menu-item key="2">
            <a-icon type="desktop" />
            <span>Spare parts</span>
        </a-menu-item>
        <a-menu-item key="3">
            <a-icon type="inbox" />
            <span>Upload</span>
        </a-menu-item>

        <a-sub-menu key="sub1">
        <span slot="title"><a-icon type="car" /><span>Motocycle</span></span>
        <a-menu-item key="5">
         Upload
        </a-menu-item>
        <a-menu-item key="6">
         View
        </a-menu-item>
      </a-sub-menu>

        <a-sub-menu key="sub2">
        <span slot="title"><a-icon type="tool" /><span>Spare parts</span></span>
        <a-menu-item key="5">
         Upload
        </a-menu-item>
        <a-menu-item key="6">
         View
        </a-menu-item>
      </a-sub-menu>
    
        </a-menu>
    </div>
 </a-affix> -->
   </div>
 
  
  </div>
</template>

<script>

import mOto from "./motocycles.vue"
import mSpare from "./spareparts.vue"
import mUpload from "./upload.vue"
  // import {  mdbCard, mdbCardBody,  } from 'mdbvue';
  
//  import UploadImages from "vue-upload-drop-images"
  import { validationMixin } from 'vuelidate';
  import {
    required,
    email,
    minLength,
    maxLength
  } from 'vuelidate/lib/validators'

const axios = require('axios');
  export default {
      components: {
        mUpload,
        mOto,
        mSpare,
        // UploadImages,
        // mdbCard,
        // mdbCardBody,
        // mdbIcon,
        // mdbDatatable2 
      },
    name: 'Products',
    mixins: [validationMixin],
    data: () => ({
      top: 70,
        collapsed: true,
       mProduct:3,
      form: {
        firstName: null,
        lastName: null,
        gender: null,
        age: null,
        email: null,
        file:null
      },
      userSaved: false,
      sending: false,
      lastUser: null
    }),
    validations: {
      form: {
        firstName: {
          required,
          minLength: minLength(3)
        },
        lastName: {
          required,
          minLength: minLength(3)
        },
        age: {
          required,
          maxLength: maxLength(10)
        },
        gender: {
          required
        },
        email: {
          // required,
          email
        }
      }
    },
    methods: {
      mChange1(){
        this.mProduct=1;
      },
      mChange2(){
        this.mProduct=2;
      },
      mChange3(){
        this.mProduct=3;
      },
        onCollapse(collapsed, type) {
      console.log(collapsed, type);
    },
    onBreakpoint(broken) {
      console.log(broken);
    },
   toggleCollapsed() {
      this.collapsed = !this.collapsed;
      // alert( this.collapsed );
    },
         handleImages(files){
          //  alert("foo"+files[0].name);
                console.log(files)
                this.files=files;

                /*
                  [
                    {
                        "name": "Screenshot from 2021-02-23 12-36-33.png",
                        "size": 319775,
                        "type": "image/png",
                        "lastModified": 1614080193596
                        ...
                    },
                    ...
                    ]
                 */
            },
      getValidationClass (fieldName) {
        const field = this.$v.form[fieldName]

        if (field) {
          return {
            'md-invalid': field.$invalid && field.$dirty
          }
        }
      },
      clearForm () {
        this.$v.$reset()
        this.form.firstName = null
        this.form.lastName = null
        this.form.age = null
        this.form.gender = null
        this.form.email = null
      },
      saveUser () {
        this.sending = true
        var murl=this.$store.state.mUrl;
        var form_data = new FormData();

      // form_data.append("file[]", this.files);
      for( var i = 0; i < this.files.length; i++ ){
      let file = this.files[i];
      console.log(file);
      form_data.append('files[' + i + ']', file);
    }
      form_data.append('nm',this.form.firstName);
      form_data.append('desc',this.form.lastName);
      form_data.append('type',this.form.gender);
      form_data.append('am',this.form.age);

      console.log("f1: "+form_data.get("file[]"));
      console.log("form_data: "+JSON.stringify(this.files));
       for (var pair of form_data.entries()){
        console.log(pair[0]+', '+pair[1]);
      }
      
      axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=a_up',
          data: form_data,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        console.log("response: "+response);
        console.log("response1: "+ JSON.stringify(response.data));
       

      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });
        // Instead of this timeout, here you can call your API
        window.setTimeout(() => {
          this.lastUser = `${this.form.firstName} ${this.form.lastName}`
          this.userSaved = true
          this.sending = false
          // this.clearForm()
        }, 1500)
      },
      validateUser () {
        this.$v.$touch()

        if (!this.$v.$invalid) {
          this.saveUser()
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  .md-progress-bar {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
  }
   .card {
        max-width: 400px;
        width:80%;
        margin-left:auto;
      
      margin-right:auto;
    }
    $c1: rgb(167, 202, 164);
    $c2:  #001529;
    $c3:   rgba(0, 0, 0, 0.87) ;
    $c4:  rgba(0, 0, 0, 0.87);
    .mTop{
        /* margin-top: 73px; */
        // background: linear-gradient(337deg,$c1 15%,  $c4 4%);
        background: linear-gradient($c2,$c3);
        // margin-top: -23%;
        // padding-top: 30%;
    }
        ul.ant-menu-inline-collapsed {
    width: 8px;

    }
        
    li.ant-menu-item{
        padding: 1px;
    }
</style>