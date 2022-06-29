<template>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3"
          >رمز المستخدم</elemet-label
        >
        <div class="col-8">
          <element-input type="text" class="form-control" @change="objChanged" v-model.trim="myObj.code"  />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3" style="padding-left: 6px"
          >اسم المستخدم</elemet-label
        >
        <div class="col-8">
          <element-input type="text" class="form-control" @change="objChanged" v-model.trim="myObj.name" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3" style="padding-left: 6px"
          >البريد الالكتروني</elemet-label
        >
        <div class="col-8">
          <element-input
            type="text"
            class="form-control"
            @change="objChanged"
            v-model.trim="myObj.email"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">كلمة المرور</elemet-label>
        <div class="col-8">
          <element-input
            type="text"
            class="form-control"
            @change="objChanged"
            v-model.trim="myObj.password"
          />
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-2">الفرع </elemet-label>
        <div class="col-8">
          <element-input
            type="text"
            class="form-control"
            @change="objChanged"
            v-model.trim="myObj.branch_id"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-2">الصفة</elemet-label>
        <div class="col-8">
          <v-select :options="role" @change="objChanged" v-model="myObj.role"/>
        </div>
      </div>
      <div class="form-group row mt-2">
        <div class="col-md-2 justify-content-right">
          <checkbox-switch></checkbox-switch>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import VSelect from "../../Shared/VSelect.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
export default {
//sync:['code','name','email','password','branch_name'],
  emits: ["input"],
  components: {
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
  },
  data() {
    return {
      rvalue: "",
      role: ["مدير عام", "محاسب", "كاشير"],
      myObj:{
        code: '',
        name: '',
        email: '',
        password: '',
        branch_id: '',
        role:'كاشير'
      }
    };
  },
  methods: {
    // saveMain() {
    //   const formData = {
    //     code: this.code,
    //     name: this.name,
    //     email: this.email,
    //     password: this.password,
    //     branch_name: this.branch_name,
    //     //role:this.role
    //   };
    //   this.$emit("save-main", formData);
    //   console.log("save main");
    // },
    objChanged(){
        this.$emit("input",this.myObj);
        //console.log(this.myObj);
    }
  },
};
</script>

<style>
</style>
