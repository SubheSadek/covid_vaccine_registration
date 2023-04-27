import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters({
            dataList: "getDataList",
            dataList2: "getDataListTwo",
        }),
    },
    methods: {},
};
