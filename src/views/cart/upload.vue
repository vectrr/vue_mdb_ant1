<template>
  <div class="mTopu" style="max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    width: 90%;">
      
      <!-- <div style="background-color:#001529;height:63px;margin-top:-50px;" ></div> -->
 <md-progress-bar md-mode="indeterminate" v-if="sending" />
  <mdb-card style="width:99%;max-width:800px;margin-bottom:3%;padding-top:42px;padding-bottom:42px; " >
    <mdb-card-body>
          <!-- <mdb-datatable-2 striped bordered small hover responsive fixedHeader
      arrows maxHeight="400px" v-model="data" /> -->
      

 <a-form :form="form" @submit="handleSubmit"  style="margin-left: auto;margin-right: auto;z-index:0;justify-content: space-around;width:99%;max-width:700px;" layout="vertical" >
      <md-card class="md-small-size-100" style="margin-left: auto;
    margin-right: auto;">
     

        <md-card-content>

        <a-form-item v-bind="formItemLayout">
      <span slot="label">
        Name&nbsp;
        <a-tooltip title="What do you want us to call you?">
          <a-icon type="question-circle-o" />
        </a-tooltip>
      </span>
      <a-input
        v-decorator="[
          'name',
       
          {   
           initialValue :name,
            rules: [{ required: true, message: 'Please input your Name!', whitespace: true,}],
          },
        ]"
      />
    </a-form-item>
    <a-form-item v-bind="formItemLayout" label="E-mail">
      <a-input
        v-decorator="[
          'email',
          {
           initialValue :mail,
            rules: [
              {
                type: 'email',
                message: 'The input is not valid E-mail!',
              },
              {
                required: true,
                message: 'Please input your E-mail!',
              },
            ],
          },
        ]"
      />
    </a-form-item>

    <a-form-item v-bind="formItemLayout" label="Phone Number">
      <a-input
        v-decorator="[
          'phone',
          {
           initialValue :phone,
            rules: [{ required: true, message: 'Please input your phone number!' }],
          },
        ]"
        style="width: 100%"
      >
        <a-select
          slot="addonBefore"
          v-decorator="['prefix', { initialValue: '254' }]"
          style="width: 70px"
        >
          <a-select-option value="254">
            +254
          </a-select-option>
         
        </a-select>
      </a-input>
    </a-form-item>

      <a-form-item v-bind="formItemLayout" label="Message">
      <a-textarea
        v-decorator="[
          'msg',
          {
            rules: [{ 
                required: false, message: 'How can we help you?' }],
          },
        ]"
        style="width: 100%"
      >
  
      </a-textarea>
    </a-form-item>
 

    <!-- <a-form-item v-bind="tailFormItemLayout">
      <a-checkbox v-decorator="['agreement', { valuePropName: 'checked' }]">
        I have read the
        <a href="">
          agreement
        </a>
      </a-checkbox>
    </a-form-item> -->



<!-- 
    <a-form-item v-bind="tailFormItemLayout">
      <a-button type="primary" html-type="submit">
        Register
      </a-button>
    </a-form-item> -->
    
            <div class="text-center py-4 mt-3">
          <mdb-btn style="color:#e9ecef;background-color:#0c0f24;" color="" type="submit" :disabled="sending">Send Inquery</mdb-btn>
        </div>
          </md-card-content>
     
     


      </md-card>

   
      <md-snackbar :md-active.sync="error">{{ emsg }} </md-snackbar>
  </a-form>
    </mdb-card-body>
  </mdb-card>

  




  </div>
</template>

<script>
  import {  mdbCard, mdbCardBody, mdbBtn } from 'mdbvue';
  

const axios = require('axios');

export default {
    components: {
        mdbBtn,
        // UploadImages,
        mdbCard,
        mdbCardBody,
        // mdbInput,
        // mdbIcon,
        // mdbDatatable2 
      },
      
  props: ['cid'],
  data() {
    return {
      confirmDirty: false,
      mData:null, 
      error:false,
      emsg:null,
      name:null,
      mail:null,
      phone:null,
      // residences,
      autoCompleteResult: [],
      formItemLayout: {
        labelCol: {
          xs: { span: 24 },
          sm: { span: 8 },
        },
        wrapperCol: {
          xs: { span: 24 },
          sm: { span: 16 },
        },
      },
      tailFormItemLayout: {
        wrapperCol: {
          xs: {
            span: 24,
            offset: 0,
          },
          sm: {
            span: 16,
            offset: 8,
          },
        },
      },
    };
  },
  beforeCreate() {
    this.form = this.$form.createForm(this, { name: 'register' });
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
        console.log("response1: "+ JSON.stringify(response.data));
       
    if(response.data.val==1){ 
            // this.emsg = response.data.message;
            this.name=response.data.d.nm;
            this.mail=response.data.d.em;
            this.phone=response.data.d.pn;
             
            // const mail=response.data.d.mail;
            // const phone=response.data.d.phone;

            // this.form.setFieldsValue({
            //   name: "yyy",email:mail,phone:phone
            //   });
       
          
           
          }
      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });
        // Instead of this timeout, here you can call your API
      //  this.sending = false
    },
      sendInquery () {
        this.sending = true
        var murl=this.$store.state.mUrl;
     
        var mCarray=[];
          if(this.$cookies.isKey("mp")){
              mCarray=JSON.parse(this.$cookies.get("mp"))
          }
 const article = { 
    nm:this.mData.name ,
    phone:this.mData.phone,
    em:this.mData.email,
    msg:this.mData.msg,
    mCarray:mCarray
 };
 
      console.log("form_data: "+JSON.stringify(article));
      axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=mail',
          data: article,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        this.sending = false
        console.log("response: "+ JSON.stringify(response));
        // console.log("response1: "+ JSON.stringify(response.data));
       
    if(response.data.code==1){ 
            this.emsg = response.data.message;
            //  this.clearForm1();
            this.error = true
           
          }
      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });
        // Instead of this timeout, here you can call your API
      //  this.sending = false
      },
    handleSubmit(e) {
      e.preventDefault();

      this.form.validateFieldsAndScroll((err, values) => {
        if (!err) {
          this.mData=values;
          this.sendInquery();
          console.log('Received values of form: ', values);
        }
      });
    },
    handleConfirmBlur(e) {
      const value = e.target.value;
      this.confirmDirty = this.confirmDirty || !!value;
    },
    compareToFirstPassword(rule, value, callback) {
      const form = this.form;
      if (value && value !== form.getFieldValue('password')) {
        callback('Two passwords that you enter is inconsistent!');
      } else {
        callback();
      }
    },
    validateToNextPassword(rule, value, callback) {
      const form = this.form;
      if (value && this.confirmDirty) {
        form.validateFields(['confirm'], { force: true });
      }
      callback();
    },
    handleWebsiteChange(value) {
      let autoCompleteResult;
      if (!value) {
        autoCompleteResult = [];
      } else {
        autoCompleteResult = ['.com', '.org', '.net'].map(domain => `${value}${domain}`);
      }
      this.autoCompleteResult = autoCompleteResult;
    },
  },
    mounted() {
  
    if(this.cid!="" && this.cid!=undefined){
      console.log("url ok="+this.cid)
      this.mSearchitem(this.cid);
    }else{
      
    // this.fetchNews()
      console.log("url not ok")
    }
  },
};
</script>

<style lang="scss" scoped>

.btn-default {
  margin-left: 50%;
  margin-right:50%;
 color:#e9ecef;
 background-color:#0c0f24 !important
}
.card .card-body{
    padding: 0px;
}
  .md-progress-bar {
    position: fixed;
    height:7px;
    top: 48px;
    right: 0;
    left: 0;
    z-index: 3;
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
        // background: linear-gradient($c2,$c3);
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