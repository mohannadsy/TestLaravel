<template>
  <div class="row mt-2">
    <div class="col-md-5">
      <div class="form-group row mt-3">
        <elemet-label class="col-form-label col-4">
          {{ $t("defaultCashOnHand") }}</elemet-label
        >
        <div class="col-7">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-4">
          {{ $t("defaultRepository") }}</elemet-label
        >
        <div class="col-md-7">
          <element-input type="text" class="form-control" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
export default {
  props: ["branchInformaion", "form"],
  components: {
    ElemetLabel,
    ElementInput,
  },
    watch: {
    branchInformaion() {
      Object.assign(this.myObj, this.branchInformaion);
    },
  },
};
</script>

<style>
.col-form-label {
  padding-left: 4px;
}
.form-control {
  padding-right: 6px;
}
</style>
