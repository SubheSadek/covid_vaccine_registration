<template>
    <Select
        class="custom_inp" id="selectSearchScroll" :model-value="formValue"
        @on-change="handleChange" size="large" @on-select="handleSelect"
        filterable clearable @on-query-change="onQuerySearch"
        :not-found-text="`No ${title} found with this keyword`"
        :placeholder="`${title}`" :filter-by-label="false"
    >
        <Option v-if="initialData.length > 0 ? false : true" :value="`${title}}`" disabled>{{ title }}</Option>
        <Option v-for="item in initialData" :value="item.value" :label="item.name" :key="item.value"></Option>
    </Select>

</template>
<script setup>
import { Select, Option } from 'view-ui-plus';
import { onMounted, reactive, ref } from 'vue';
import { callApi } from '../apiService';
const props = defineProps(['formValue', 'title', 'url', 'initialData'])
const emit = defineEmits(['update:formValue'])
const preventSearch = ref(false);
const isLoading2 = ref(false);
const params = reactive({
    search: '',
    lastId: 0,
})

async function handleChange(value) {
    emit('update:formValue', (value ? value : null))
    if (!value) {
        preventSearch.value = false;
        onQuerySearch(null)
    }
}
function handleSelect(data) {
    preventSearch.value = true;
}
async function onQuerySearch(search) {
    if (search == '') return;
    props.initialData.length = 0;
    params.search = search;
    params.lastId = 0;
    await loadData();
}
async function loadData() {
    if (preventSearch.value) return;
    isLoading2.value = true;

    if (props.initialData.length > 0) {
        params.lastId = props.initialData[props.initialData.length - 1].id;
    }

    const res = await callApi('GET', `/${props.url}`, null, params);
    if (res.status == 200) {
        props.initialData.push(...res.data.json_data);
    }
    isLoading2.value = false;
}

onMounted(async()=>{
    await loadData()
    const listElm = document.querySelector('#selectSearchScroll .ivu-select-dropdown');
    listElm.addEventListener('scroll', async (e) => {
        if (listElm.scrollTop + listElm.clientHeight >= listElm.scrollHeight) {
           await loadData();
        }
    })
})

</script>

<style scoped>
._create_new{
    position: absolute;
    right: 6px;
    top: -31px;
}
._create_new span{
    cursor: pointer;
    color: #0090ebcf;
    font-weight: 700;
    text-decoration: underline;
}

</style>
