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
            <element-input />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseAcount")
          }}</elemet-label>
          <div class="col-8">
            <element-input />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseAddress")
          }}</elemet-label>
          <div class="col-8">
            <element-input />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("warehouseMan")
          }}</elemet-label>
          <div class="col-8">
            <element-input />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-4">{{
            $t("storageCapacity")
          }}</elemet-label>
          <div class="col-8">
            <element-input />
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-2">{{
            $t("userNotes")
          }}</elemet-label>
          <div class="col-md-9">
            <text-area class="form-control"></text-area>
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

export default {
  components: {
    ElemetLabel,
    ElementInput,
    TextArea,
  },
};
</script>

<style scoped>
.col-md-4 {
  padding-right: 0px;
}
</style>
