import { mapGetters } from "vuex";
export default {
    data() {
        return {
            baseUrl: base_url,
            isLoading: false,
            isLoading2: false,
        };
    },
    computed: {
        ...mapGetters({
            dataList: "getDataList",
            dataList2: "getDataListTwo",
        }),
    },
    methods: {},
};
