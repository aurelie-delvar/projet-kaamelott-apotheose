//
// js/lib.js
// useful functions for my quiz
//

async function getQuestions() {
  const req = await fetch(`${url}/question`);
  const questions = await req.json();

  questions.forEach(function (question){
    insertQuestionInDom(question);
  })
}

