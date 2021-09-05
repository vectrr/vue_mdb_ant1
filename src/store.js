import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    docs: true,
    mKey: "mKey",

  },
  mutations: {
    toggleDocs(state, value) {
      state.docs = value;
    }
  },
  actions: {

  }
})
