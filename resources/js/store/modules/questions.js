const state = {

  questions: null,

  questionStatus: null,

  questionTitle: '',

  // questionDescription: '',
  
};

const getters = {

  questions: state => {
    return state.questions;
  },

  status: state => {
    return {
      questionsStatus: state.questionStatus,
    }
  },

  questionTitle: state => {
    return state.questionTitle;
  },

  // questionDescription: state => {
  //   return state.questionDescription;
  // },

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

      });
  },

  createQuestion({commit, state}) {
    
    commit('setQuestionsStatus', 'loading');

    axios.post('/api/questions', { title: state.questionTitle })
    // axios.post('/api/questions', { title: state.questionTitle, description: state.questionDescription })
      .then(res => {
        commit('pushQuestion', res.data);
        commit('createTitle', '');
        // commit('createDesciption', '');
      })
      .catch(err => {

      });

  }

};

const mutations = {

  setQuestions(state, questions) {
    state.questions = questions;
  },

  setQuestionsStatus(state, status) {
    state.questionsStatus = status;
  },

  createTitle(state, title) {
    state.questionTitle = title;
  },

  // createDescription(state, description) {
  //   state.questionDescription = description;
  // },

  pushQuestion(state, question) {
    state.questions.data.unshift(question);
  }
};

export default {
  state, getters, actions, mutations
}