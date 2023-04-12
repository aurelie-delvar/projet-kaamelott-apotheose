//
// js/lib.js
// useful functions for my quiz
//


async function getQuestions() {

  const req = await fetch(`${urlQuizz}`);
  
  const quizz = await req.json();

  const questions = quizz.questions;
  
 // showQuestion(questions[0]);

  /*function handleClick() {
  console.log("le joueur a cliqué sur le bouton start");
    questions.forEach(function (question){
    showQuestion(question);
      
    });
    showQuestion(0);
  }*/

  //startBtn.addEventListener('click', handleClick);

  
}

