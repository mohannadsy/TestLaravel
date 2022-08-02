<template>
  <div class="row mt-2">
    <div class="col-md-6">
      <div class="form-group row mt-3">
        <elemet-label class="col-form-label col-3"> {{$t('responsibility')}}</elemet-label>
        <div class="col-md-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.responsibility"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-3">{{$t('address')}} </elemet-label>
        <div class="col-md-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.address"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">
          {{$t('netWebsite')}} </elemet-label
        >
        <div class="col-md-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.website"
          />
        </div>
      </div>

      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">
          {{$t('branchEmail')}} </elemet-label
        >
        <div class="col-md-8">
          <element-input
            type="email"
            @change="objChanged"
            v-model.trim="myObj.email"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">{{$t('branchPhone')}}</elemet-label>
        <div class="col-md-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.phone"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">{{$t('branchMobile')}}</elemet-label>
        <div class="col-md-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.mobile"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";

export default {
  emits: ["save-basic"],
  props: ["branchInformaion", "form","errors"],
  components: {
    ElemetLabel,
    ElementInput,
  },
  data() {
    return {
      myObj: {
        responsibility: "",
        address: "",
        website: "",
        email: "",
        phone: "",
        mobile: "",
      },
    };
  },
  watch: {
    form() {
      this.myObj = this.form;
    },
    branchInformaion() {
      Object.assign(this.myObj, this.branchInformaion);
    },
  },
  computed: {
    objChanged() {
      this.$emit("save-basic", this.myObj);
    },
  },
};
</script>
