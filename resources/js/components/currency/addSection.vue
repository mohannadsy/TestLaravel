<template>

    <page-title><fa class="warehouse px-2" icon="warehouse" />{{$t('warehouseDirectory')}}</page-title>
    <div class="row py-2">
        <div class="col-4">
            <element-button class="plus px-3"><span><fa class="fa" icon="plus-circle" /></span> </element-button>
            <element-button class="search "><span><fa class="fa"  icon="magnifying-glass"/></span></element-button>

        </div>
        <div class="col-7" >
            <element-input></element-input>

        </div>
    </div>


    
</template>

<script>
import PageTitle from '../../Shared/PageTitle.vue'
import ElementButton from '../../Shared/ElementButton.vue'
import ElementInput from '../../Shared/ElementInput.vue'
export default {
    components:{
        PageTitle,
        ElementButton,
        ElementInput
    }
    
}
</script>

<style scoped>
.plus, .search{
    border:none;
}
.fa{
font-size: 25px;
}
.warehouse{
    font-size: 25px;
  margin-top: 7px;
}
</style>