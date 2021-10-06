const state = {

  questions: null,

  questionStatus: null,

  questionTitle: '',

  questionDescription: '',

  question: '',

  answers: null,

  answerCount: null,

  answerBody: '',
  
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
  },

  answers: state => {
    return state.answers;
  },

  answerCount: state => {
    return state.answerCount;
  },

  answerBody: state => {
    return state.answerBody;
  },

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
        commit('setAnswers', res.data.data.attributes.answers.data);
        console.log('setAnswerCount', res.data.data.attributes.answers.answer_count);
        commit('setAnswerCount', res.data.data.attributes.answers.answer_count);
      })
      .catch(err => {
        console.log('Unable to fetch question.');
      })
  },

  createQuestion({commit, state}) {
    
    commit('setQuestionsStatus', 'loading');

    axios.post('/api/questions', { title: state.questionTitle, description: state.questionDescription } )
      .then(res => {
        console.log(res.data);
        commit('pushQuestion', res.data);
        commit('createTitle', '');
        commit('createDescription', '');
      })
      .catch(err => {
        console.log('Unable to create question.')
      });

  },

  createAnswer({commit, state}, data) {

    axios.post('/api/questions/'+data.questionId+'/answer', { body: state.answerBody })
    .then(res => {
      commit('setAnswers', res.data.data);
      // console.log('setAnswerCount', res.data.answer_count);
      commit('setAnswerCount', res.data.answer_count);

    })
    .catch(err => {
      console.log('Unable to create answer.');
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
  },

  setAnswers(state, answers) {
    state.answers = answers;
  },

  setAnswerCount(state, count) {
    state.answerCount = count;
  },

  createAnswerBody(state, answer) {
    state.answerBody = answer;
  },

};

export default {
  state, getters, actions, mutations
}