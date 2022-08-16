<template>
  <div class="row px-3 pb-2">
    <page-title><fa icon="warehouse" /> {{ $t("warehouseCard") }}</page-title>
  </div>
  <form>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseCode")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.code"
            />
          </div>
          <div v-if="form.errors.code">{{ form.errors.code }}</div>
          <!-- <jet-validation-errors class="mb-3" /> -->
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseName")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.name"
            />
          </div>
          <div v-if="form.errors.name">{{ form.errors.name }}</div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("latinName")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.latin_name"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseType")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.type"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4"
            >الفرع الرئيسي</elemet-label
          >
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.branch_id"
            />
          </div>
        </div>

        <div class="toggle_container">
          <ToggleButton
            v-model="storeObject.is_active"
            @change="objChanged"
            @change-name="triggerToggleEvent"
            :defaultState="storeObject.is_active"
          />
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import PageTitle from "../../Shared/PageTitle.vue";
import VSelect from "../../Shared/VSelect.vue";
import ToggleButton from "../../Shared/ToggleButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  components: {
    ElemetLabel,
    ElementInput,
    PageTitle,
    VSelect,
    ToggleButton,
  },
  props: ["form","storeInformation"],
  data() {
    return {
      storeObject: useForm({
        code: "",
        name: "",
        latin_name: "",
        type: "",
        is_active: true,
        branch_id: "",
      }),
    };
  },
  watch:{
     form() {
      this.storeObject = this.form;
    },
     storeInformation() {
      Object.assign(this.storeObject, this.storeInformation);
    },
  },
  computed: {
    objChanged() {
      this.$emit("save-main", this.storeObject);
    },
  },
  methods: {
    triggerToggleEvent(value) {
      this.storeObject.is_active = value;
    },
  },
};
</script>

<style scoped>
</style>
