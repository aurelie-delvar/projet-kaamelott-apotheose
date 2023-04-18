// url API

// I retrieve the url of my current page
const url= document.location.href;
console.log(url);
// I remove the url from my page and I only keep the last information of the url
const idPage = url.substring(url.lastIndexOf( "/" )+1 );
// I remove the end of the url
const newUrl = url.replace("quizz/" + idPage,"");
console.log(newUrl);

// I concatenate the url of the api with the id of my page
//const urlQuizz = 'http://localhost:8000/api/quizz/' + idPage;
const urlQuizz = newUrl + "api/quizz/" + idPage;
console.log(urlQuizz);

function initApp(){
   
   showQuestion(0);
}

initApp();
