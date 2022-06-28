<template>
    <!-- <div>
        <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" v-model.trim="code"></div>
        <div class="row mt-2">
        <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" v-model.trim="name"></div>
        <input type="checkbox" checked data-toggle="toggle" data-style="android" data-onstyle="info"/>
        </div>
         <div class="col-md-6"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control" v-model.trim="name"></div>
    </div> -->
    <form @submit.prevent="submitForm">
        <div class="row px-3 mt-1 pb-2">
             <page-title>بطاقة فرع</page-title>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4">رمز الفرع</elemet-label>
                    <div class="col-8">
                        <element-input
                            type="text"
                            value=""
                            v-model.trim="code"/>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4">اسم الفرع</elemet-label>
                    <div class="col-8">
                        <element-input
                            type="text"
                            value=""
                            v-model.trim="name"/>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4"> الفرع الرئيسي</elemet-label>
                    <div class="col-8">
                        <element-input
                            type="text"
                            v-model.trim="branch_id"
                            value=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                        <div class="form-group row mt-4">
                            <input style="visibility:hidden;" />
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-md-2 justify-content-right">
                                <checkbox-switch checked></checkbox-switch>
                        </div>
                            </div>
            </div>
        </div> 
    </form>
    
   

</template>

<script>
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
export default {
    components: {
    PageTitle,
    ElemetLabel,
    ElementInput,
    CheckboxSwitch,
},
    

}
</script>

<style>

</style>

