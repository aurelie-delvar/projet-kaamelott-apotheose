// url API

// I retrieve the url of my current page
// location is a property of the document object, which represents the url of the current page
// href is a property of the location object which gives the complete url
const url = document.location.href;

// console.log(url);
// http://localhost:8000/quizz/1

// I remove the url from my page and I only keep the last information of the url
// substring allow to extract a part of a string
// lastIndexOf search for the last occurence of "/" in the string
// +1 to begin after the last "/" => gives the uri
const idPage = url.substring(url.lastIndexOf( "/" ) + 1);

// I remove the end of the url
// replace takes quizz + idPage and replace by nothing
const newUrl = url.replace("quizz/" + idPage,"");

// I concatenate the url of the api with the id of my page
const urlQuizz = newUrl + "api/quizz/" + idPage;

// console.log(urlQuizz);
// http://localhost:8000/api/quizz/1


function initApp(){
   
   showQuestion(0);
}

initApp();
