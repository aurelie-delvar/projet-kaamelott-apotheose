//
// js/lib.js
// useful functions for my quiz
//

async function getQuestions() {
  const req = await fetch(`${url}/quizz/1`);
  const quizz = await req.json();
  const questions = quizz.questions;

  questions.forEach(function (question){
    showQuestion(question);
  })
}

