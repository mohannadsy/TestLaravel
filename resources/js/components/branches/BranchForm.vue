<template>
    <form @submit.prevent="submitForm">
        <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">بطاقة فرع</h2>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" v-model.trim="code"></div>
                    <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" v-model.trim="name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control" v-model.trim="branch_id"></div>
                    <div class="col-md-12"><label class="labels">المسؤولية</label><input type="text" class="form-control" v-model.trim="responsibility"></div>
                    <div class="col-md-12"><label class="labels">العنوان</label><input type="text" class="form-control" v-model.trim="address"></div>
                    <div class="col-md-12"><label class="labels">موقع الانترنت</label><input type="text" class="form-control" v-model.trim="website"></div>
                    <div class="col-md-12"><label class="labels">البريد الالكتروني</label><input type="text" class="form-control" v-model.trim="email"></div>
                    <div class="col-md-12"><label class="labels">هاتف</label><input type="text" class="form-control" v-model.trim="phone"></div>
                    <div class="col-md-12"><label class="labels">جوال</label><input type="text" class="form-control" v-model.trim="mobile"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <button class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </div>
    </form>
</template>

<script>
export default {
    emits:['save-data'],
    data() {
        return {
            code: '',
            name: '',
            branch_id: '',
            responsibility: '',
            address: '',
            website: '',
            email: '',
            phone: '',
            mobile: ''
        }
    },
    methods:{
        submitForm(){
            const formData = {
                code: this.code,
                name:this.name,
                branch_id:this.branch_id,
                responsibility:this.responsibility,
                address:this.address,
                website:this.website,
                email:this.email,
                phone:this.phone,
                mobile:this.mobile
            };
            this.$emit('save-data',formData);
            console.log(formData);
        }
    }
}
</script>
