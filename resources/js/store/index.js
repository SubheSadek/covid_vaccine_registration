
import { createStore } from 'vuex'


const auth = window.authUser ? window.authUser : null;

const store = createStore({
  state() {
    return {
        authUser  : auth,
        isModal   : false,
        isModal2  : false,
        dataLoading : false,
        dataList  : [],
        dataListTwo  : [],
    }
  },

  getters: {
    getAuthUser(state) {
      return state.authUser;
    },
    getDataList(state) {
        return state.dataList;
    },
    getDataListTwo(state) {
        return state.dataListTwo;
    },
  },

  mutations: {
    setAuthUser(state, data) {
       state.authUser = data;
    },
    setDataList(state, data) {
      state.dataList = data;
    },
    pushDataList(state, {data, method}) {
        if(method == 'POST') {
            state.dataList.data.unshift(data);
            state.dataList.total += 1;
        }
        else if (method == 'PUT') {
            let index = state.dataList.data.findIndex(item => item.id == data.id);
            state.dataList.data.splice(index, 1, data);
        }
    },
    setDataListTwo(state, data) {
      state.dataListTwo = data;
    },
    pushDataListTwo(state, {data, method}) {
        if(method == 'POST') {
            state.dataListTwo.data.unshift(data);
            state.dataListTwo.total += 1;
        }
        else if (method == 'PUT') {
            let index = state.dataListTwo.data.findIndex(item => item.id == data.id);
            state.dataListTwo.data.splice(index, 1, data);
        }
    },

  }

})

export default store;
