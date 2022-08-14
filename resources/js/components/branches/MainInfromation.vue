<template>
  <div class="row px-3 mt-1 pb-2">
    <page-title>{{$t('branchCard')}}</page-title>
  </div>
  <form>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{$t('branchCode')}} </elemet-label>
          <div class="col-8">
            <element-input
              type="text"
              @change="objChanged"
              v-model.trim="myObj.code"
            />
          </div>
          <!-- <h2>{{ myObj.errors.hasOwnProperty('code') }}</h2> -->
          <div v-if="form.errors.code">{{ form.errors.code }}</div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{$t('branchName')}} </elemet-label>
          <div class="col-8">
            <element-input
              type="text"
              @change="objChanged"
              v-model.trim="myObj.name"
            />
          </div>
          <div v-if="form.errors.name">{{ form.errors.name }}</div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">
            {{$t('mainBranch')}} </elemet-label>
          <div class="col-8">
            <element-input
              type="text"
              @change="objChanged"
              v-model.trim="myObj.branch_id"
            />
          </div>
        </div>
      </div>

      <div class="col-md-4 box">
        <div :class="{ active: myObj.is_active }" class="toggle_container">
          <ToggleButton
            v-model="myObj.is_active"
            @change="objChanged"
            @change-name="triggerToggleEvent"
            :defaultState="myObj.is_active"

          />
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import ToggleButton from "../../Shared/ToggleButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  props: ["branchInformaion", "form", "errors"],
  emits: ["save-main"],
  components: {
    PageTitle,
    ElemetLabel,
    ElementInput,
    ToggleButton,
  },
  data() {
    return {
      myObj: useForm({
        code: "",
        name: "",
        branch_id: "",
        is_active: true,
      }),
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
      this.$emit("save-main", this.myObj);
    },
  },
  methods: {
    triggerToggleEvent(value) {
      this.myObj.is_active = value;
      console.log(this.myObj.is_active);
    },
  },
};
</script>

<style scoped>
.toggle_container {
  margin: 0px auto;
  padding: 8px 0;
  transition: all 0.15s;
  /* background: #efefef; */
  /* width: 120px; */
  /* border-radius: 30px; */

}
/* .toggle_container.active {
  background: #e9ffef;
} */
</style>

