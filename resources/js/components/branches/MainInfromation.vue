<template>
    <div>
        <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" v-model.trim="code"></div>
        <div class="row mt-2">
        <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" v-model.trim="name"></div>
        <input type="checkbox" checked data-toggle="toggle" data-style="android" data-onstyle="info"/>
        </div>
         <div class="col-md-6"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control" v-model.trim="name"></div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>

