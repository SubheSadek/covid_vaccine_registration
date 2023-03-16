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

<script>

export default {
    name: 'SelectSearchOption',
    components: {},
    props: ['formValue', 'title', 'url', 'initialData'],
    emits: ['update:formValue'],
    data() {
        return {
            preventSearch: false,
            params: {
                search: null,
                lastId: 0,
            },
        }
    },
    methods: {
        handleChange(value) {
            this.$emit('update:formValue', value ? value : null)
            let singleData = value;
            if (value) {
                let index = this.initialData.findIndex(item => item.id == value);
                if (index != -1) {
                    singleData = this.initialData[index];
                }
            }

            if (!value) {
                this.preventSearch = false;
                this.onQuerySearch(null)
            }

        },
        handleSelect(value) {
            this.preventSearch = true;
        },
        async onQuerySearch(search) {
            if (search == '') return;
            this.initialData.length = 0;
            this.params.search = search;
            this.params.lastId = 0;

            this.loadData();
        },
        async loadData() {
            if (this.preventSearch) return;
            this.isLoading2 = true;

            if (this.initialData.length > 0) {
                this.params.lastId = this.initialData[this.initialData.length - 1].id;
            }

            const res = await this.callApi('GET', `/${this.url}`, null, this.params);
            if (res.status == 200) {
                this.initialData.push(...res.data.json_data);
            }
            this.isLoading2 = false;
        },
    },
    mounted() {
        const listElm = document.querySelector('#selectSearchScroll .ivu-select-dropdown');
        listElm.addEventListener('scroll', e => {
            if (listElm.scrollTop + listElm.clientHeight >= listElm.scrollHeight) {
                this.loadData();
            }
        })
    },
    created() {
        this.loadData();
    }
}
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
