<template>
  <form>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label
            class="col-form-label col-md-4"
            style="padding-left: 2px"
            >{{ $t("mainWarehouse") }}</elemet-label
          >
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.store_id"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseAcount")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.account_id"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseAddress")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.address"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4"
            >موقع الانترنت</elemet-label
          >
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.website"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseMan")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.store_keeper"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("storageCapacity")
          }}</elemet-label>
          <div class="col-8">
            <element-input
              @change="objChanged"
              v-model.trim="storeObject.storage_amount"
            />
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-2">{{
            $t("userNotes")
          }}</elemet-label>
          <div class="col-md-9">
            <text-area
              class="form-control"
              @change="objChanged"
              v-model.trim="storeObject.notes"
            ></text-area>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>


<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import TextArea from "../../Shared/TextArea.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  components: {
    ElemetLabel,
    ElementInput,
    TextArea,
  },
  props: ["form","storeInformation"],
  data() {
    return {
      storeObject: useForm({
        store_id: "",
        account_id: "",
        address: "",
        website: "",
        store_keeper: "",
        storage_amount: "",
        notes: "",
      }),
    };
  },
  computed: {
    objChanged() {
      this.$emit("save-basic", this.storeObject);
    },
  },
   watch:{
     storeInformation() {
      Object.assign(this.storeObject, this.storeInformation);
    },
   }
};
</script>

<style scoped>
.col-md-4 {
  padding-right: 0px;
}
</style>
