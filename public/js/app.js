// url API

// I retrieve the url of my current page
const url= document.location.href;
// I remove the url from my page and I only keep the last information of the url
const idPage = url.substring(url.lastIndexOf( "/" )+1 );
// I concatenate the url of the api with the id of my page
const urlQuizz = 'http://localhost:8000/api/quizz/' + idPage;

//console.log(urlQuizz);

function initApp(){
    
   // getQuestions();
   
   showQuestion(0);
}

initApp();
