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
          <v-select
            :options="roleOptions"
            @change="roleChange($event)"
            v-model="myObj.role"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <div class="col-md-2 justify-content-right">
          <checkbox-switch
            v-model="myObj.active"
            @change="switch_on()"
            checked
          ></checkbox-switch>
        </div>
        <div class="col-md-3">
          <label v-if="myObj.active"> {{$t('userEnabled')}}</label>
          <label v-else> {{$t('userNotEnabled')}}</label>
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
import Label from "../../Jetstream/Label.vue";
export default {
    props: ["branchInformaion", "form"],
  emits: ["save-main"],
  components: {
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
    Label,
  },
  data() {
    return {
      rvalue: "",
      roleOptions: ["مدير عام", "محاسب", "كاشير"],
      myObj: {
        code: "",
        name: "",
        email: "",
        password: "",
        branch_id: "",
        role: "مدير عام",
        active: true,
      },
    };
  },
   watch: {
    branchInformaion() {
      Object.assign(this.myObj, this.branchInformaion);
    },
  },
  methods: {
    objChanged() {
      this.$emit("save-main", this.myObj);
    },
    roleChange(e) {
      this.myObj.role = e.target.value;
      this.$emit("save-main", this.myObj);
    },
    switch_on() {
      this.myObj.active = !this.myObj.active;
    },
  },
};
</script>

<style>
</style>
