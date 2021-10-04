const state = {

  questions: null,

  questionStatus: null,

  questionTitle: '',

  questionDescription: '',

  question: '',
  
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

  questionDescription: state => {
    return state.questionDescription;
  },

  question: state => {
    return state.question;
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

      });
  },

  fetchQuestion({commit, dispatch}, questionId) {
    axios.get('/api/questions/' + questionId)
      .then(res => {
        commit('setQuestion', res.data);
        console.log('res.data', res.data);
      })
      .catch(err => {
        console.log('Unable to fetch question.');
      })
  },

  createQuestion({commit, state}) {
    
    commit('setQuestionsStatus', 'loading');

    console.log('state.questionDescription: ', state.questionDescription);

    // axios.post('/api/questions', { title: state.questionTitle })
    axios.post('/api/questions', { title: state.questionTitle, description: state.questionDescription } )
      .then(res => {
        console.log(res.data);
        commit('pushQuestion', res.data);
        commit('createTitle', '');
        commit('createDescription', '');
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

  createDescription(state, description) {
    state.questionDescription = description;
  },

  pushQuestion(state, question) {
    state.questions.data.unshift(question);
  },

  setQuestion(state, question) {
    state.question = question;
  }
};

export default {
  state, getters, actions, mutations
}