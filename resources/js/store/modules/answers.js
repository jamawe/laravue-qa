// const state = {

//   answerBody: '',
  
// };

// const getters = {

//   answerBody: state => {
//     return state.answerBody;
//   }

// };

// const actions = {

//   createAnswer({commit, state}, data) {

//     console.log('data.questionId', data.questionId);
//     console.log('data.answerBody', data.answerBody);

//     axios.post('/api/questions/'+data.questionId+'/answer', { body: state.answerBody })
//     .then(res => {
//       // commit('pushAnswers', { answers: res.data })
//       console.log('ANSWER', res.data);
//     })
//     .catch(err => {
//       console.log('Something happened...');
//     })
//   },

//   // createQuestion({commit, state}) {
    
//   //   commit('setQuestionsStatus', 'loading');

//   //   console.log('state.questionDescription: ', state.questionDescription);

//   //   // axios.post('/api/questions', { title: state.questionTitle })
//   //   axios.post('/api/questions', { title: state.questionTitle, description: state.questionDescription } )
//   //     .then(res => {
//   //       console.log(res.data);
//   //       commit('pushQuestion', res.data);
//   //       commit('createTitle', '');
//   //       commit('createDescription', '');
//   //     })
//   //     .catch(err => {

//   //     });

//   // }

// };

// const mutations = {

//   createAnswerBody(state, answer) {
//     state.answerBody = answer;
//   },

//   pushAnswer(state, answer) {

//   }

// };

// export default {
//   state, getters, actions, mutations
// }