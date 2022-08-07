<template>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3"
          >{{$t('usercode')}} </elemet-label
        >
        <div class="col-8">
          <element-input
            type="text"
            class="form-control"
            @change="objChanged"
            v-model.trim="myObj.code"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3" style="padding-left: 6px"
          > {{$t('userName')}}</elemet-label
        >
        <div class="col-8">
          <element-input
            type="text"
            class="form-control"
            @change="objChanged"
            v-model.trim="myObj.name"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3" style="padding-left: 6px"
          >{{$t('userEmail')}} </elemet-label
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
        <elemet-label class="col-form-label col-md-3">{{$t('userPassword')}} </elemet-label>
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
        <elemet-label class="col-form-label col-2">{{$t('branch')}} </elemet-label>
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
        <elemet-label class="col-form-label col-2" style="padding-top:15px;">{{$t('userRole')}}</elemet-label>
        <div class="col-8">
          <element-input
           type="text"
            class="form-control"
            :options="roleOptions"
            v-model="myObj.role"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <!-- <div class="col-md-2 justify-content-right">
          <checkbox-switch
            v-model="myObj.active"
            @change="switch_on()"
            checked
          ></checkbox-switch>
        </div> -->
        <div class="col-md-3">
          <div :class="{ active: myObj.is_active }" class="toggle_container">
          <ToggleButton
            v-model="myObj.is_active"
            @change="objChanged"
            @change-name="triggerToggleEvent"
            :defaultState="myObj.is_active"
            labelEnableText="مفعل"
            labelDisableText="غير مفعل"
          />
        </div>
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
import ToggleButton from "../../Shared/ToggleButton.vue";
import Label from "../../Jetstream/Label.vue";
export default {
    props: ["userInformation", "form"],
  emits: ["save-main"],
  components: {
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
    Label,
    ToggleButton
  },
  data() {
    return {
    //   roleOptions: ["عام", "محاسب", "كاشير"],
      myObj: {
        code: "",
        name: "",
        email: "",
        password: "",
        branch_id: "",
        role: "",
        is_active: true,
      },
    };
  },
   watch: {
    form() {
      this.myObj = this.form;
    },
    userInformation() {
      Object.assign(this.myObj, this.userInformation);
    },
  },
  methods: {
    objChanged(e) {
        //  this.myObj.role = e.target.value;
      this.$emit("save-main", this.myObj);
    },
    // roleChange(e) {
    //   this.myObj.role = e.target.value;
    //   this.$emit("save-main", this.myObj);
    // },
    switch_on() {
      this.myObj.active = !this.myObj.active;
    },
  },
};
</script>

<style scoped>
.toggle_container {
  margin: 0px auto;
  background: #efefef;
  width: 120px;
  padding: 10px 0;
  border-radius: 30px;
  transition: all 0.25s;
}
.toggle_container.active {
  background: #e9ffef;
}
</style>
