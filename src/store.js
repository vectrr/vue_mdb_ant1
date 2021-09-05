import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    docs: true,
    mKey: "mKey",
    mUrl: "http://localhost/w/15/vue_mdb_ant/src/s/s1/",

  },
  mutations: {
    toggleDocs(state, value) {
      state.docs = value;
    }
  },
  actions: {

  }
})
