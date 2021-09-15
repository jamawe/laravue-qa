const state = {

  questions: null,

  questionStatus: null,
  
};

const getters = {

  questions: state => {
    return state.questions;
  },

  status: state => {
    return {
      questionsStatus: state.questionStatus,
    }
  }

};

const actions = {

  fetchFeedQuestions({commit, state}) {

    commit('setQuestionsStatus', 'loading');

    axios.get('/api/questions')
      .then(res => {
        commit('setQuestions', res.data);
        commit('setQuestionsStatus', 'success');
      })
      .catch(err => {
        console.log('Unable to fetch questions');
        commit('setQuestionsStatus', 'error');

      })
      .finally(() => {
        this.loading = false;
      });
  },

};

const mutations = {

  setQuestions(state, questions) {
    state.questions = questions;
  },

  setQuestionsStatus(state, status) {
    state.questionsStatus = status;
  },


};

export default {
  state, getters, actions, mutations
}