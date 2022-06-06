<template>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row mt-2">
            <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" :value="branch.code"></div>
            <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" :value="branch.name"></div>
        </div>
    </div>
</template>

<script>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {

  setup() {
    const branch = computed(() => usePage().props.value.auth.branch)
    return { branch }
  },
}
</script>
