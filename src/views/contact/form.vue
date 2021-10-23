<template>
  <div class="mTopu" style="max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    margin-top: -200px;
    width: 90%;">
      
      <!-- <div style="background-color:#001529;height:63px;margin-top:-50px;" ></div> -->
 <md-progress-bar md-mode="indeterminate" v-if="sending" />
  <mdb-card style="width:99%;max-width:1200px;margin-bottom:3%;padding-top:42px;padding-bottom:42px;margin-top; " >
    <mdb-card-body>
          <!-- <mdb-datatable-2 striped bordered small hover responsive fixedHeader
      arrows maxHeight="400px" v-model="data" /> -->
      

 <a-form :form="form" @submit="handleSubmit"  style="margin-left: auto;margin-right: auto;z-index:0;justify-content: space-around;" layout="vertical" >
      <md-card class="md-layout-item md-size-50 md-small-size-100" style="margin-left: auto;
    margin-right: auto;">
        <md-card-header>
          <div class="md-title text-center">Products</div>
        </md-card-header>

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
            rules: [{ required: true, message: 'Please input your Name!', whitespace: true }],
          },
        ]"
      />
    </a-form-item>
    <a-form-item v-bind="formItemLayout" label="E-mail">
      <a-input
        v-decorator="[
          'email',
          {
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
<!-- 
    <form novalidate style="
    margin-left: auto;
    margin-right: auto;z-index:0;
    justify-content: space-around;" class="md-layout" @submit.prevent="validateInquery">
      <md-card class="md-layout-item md-size-50 md-small-size-100">
        <md-card-header>
          <div class="md-title text-center">Products</div>
        </md-card-header>

        <md-card-content>
          <div class="md-layout md-gutter">
             

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('firstName')">
                <label for="first-name">Name</label>
                <md-input name="first-name" id="first-name" autocomplete="given-name" v-model="form.firstName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.firstName.required">The first name is required</span>
                <span class="md-error" v-else-if="!$v.form.firstName.minlength">Invalid name</span>
              </md-field>
            </div>

    
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('age')">
                <label for="age">Phone numeber</label>
                <md-input type="number" id="age" name="age" autocomplete="age" v-model="form.age" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.age.required">The Price is required</span>
                <span class="md-error" v-else-if="!$v.form.age.maxlength">Invalid Price</span>
              </md-field>
            </div>
          </div>

          <md-field :class="getValidationClass('email')">
            <label for="email">Email</label>
         
            <span class="md-error" v-if="!$v.form.email.required">A valid email is required</span>
            <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
          </md-field>
             
               <div class="md-layout md-gutter">
           
            <div class="md-layout-item md-small-size-100">
                          
              <mdb-input
                type="textarea"
                outline
                inputClass="z-depth-1 p-3"
                label="Message"  :rows="3"
                :disabled="sending"
                v-model="desc"
              />
          
            </div>
          </div>
        </md-card-content>
     
     

            <div class="text-center py-4 mt-3">
          <mdb-btn style="color:#e9ecef;background-color:#0c0f24;" color="" type="submit" :disabled="sending">Send Inquery</mdb-btn>
        </div>

      </md-card>

      <md-snackbar :md-active.sync="userSaved">The Product {{ lastUser }} was saved with success!</md-snackbar>
     
    </form> -->
    
    
    </mdb-card-body>
  </mdb-card>

  




  </div>
</template>

<script>
  import {  mdbCard, mdbCardBody, mdbBtn } from 'mdbvue';
  
//   import { validationMixin } from 'vuelidate';
//   import {
//     required,
 
//     minLength,
//     maxLength
//   } from 'vuelidate/lib/validators'

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
  data() {
    return {
      confirmDirty: false,
      mData:null, 
      error:false,
      emsg:null,
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
    
      sendInquery () {
        this.sending = true
        var murl=this.$store.state.mUrl;
        // var form_data = new FormData();



      // form_data.append('nm',this.mData.name);
      // form_data.append('phone',this.mData.phone);
      // form_data.append('email',this.mData.email);
      // form_data.append('message',this.mData.msg);
      // form_data.append('url',this.mData.msg);
// this.mData.append('nmz',"123");
      console.log("form_data: "+JSON.stringify(this.mData));
      // console.log("form_data: "+this.mData.nmz);
      
// Display the key/value pairs
// for (var pair of form_data.entries()) {
//     console.log(pair[0]+ ', ' + pair[1]); 
// }
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
      axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=mail',
          data: article,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        this.sending = false
        // console.log("response: "+response);
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