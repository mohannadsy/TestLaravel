<template>
    <form @submit.prevent="submitForm">
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group row mt-3">
                    <elemet-label class="col-form-label col-3"> المسؤولية</elemet-label >
                    <div class="col-8">
                        <element-input
                            v-model.trim="responsibility"
                            type="text"
                            value=""/>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-3">العنوان </elemet-label>
                    <div class="col-md-8">
                        <element-input
                            v-model.trim="address"
                            type="text"
                            value=""/>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-3"> موقع الانترنت</elemet-label>
                    <div class="col-md-8">
                        <element-input
                            v-model.trim="website"
                            type="text"
                            value=""/>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-3"> البريد الالكتروني</elemet-label>
                    <div class="col-md-8">
                        <element-input
                            v-model.trim="email"
                            type="text"
                            value=""/>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-3">هاتف</elemet-label>
                    <div class="col-md-8">
                        <element-input
                            v-model.trim="phone"
                            type="text"
                            value=""
                        />
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-3">جوال</elemet-label>
                    <div class="col-md-8">
                        <element-input
                            v-model.trim="mobile"
                            type="text"
                            value=""
                        />
                    </div>
                </div>
                        
            </div>
        </div>
    </form>
    
   
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";

export default {
    components: {
        ElemetLabel,
        ElementInput,
    },

    data() {
        return {
           
        };
    },

};

</script>