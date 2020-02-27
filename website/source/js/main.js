"use strict"

let table;
const url = "http://localhost/webb3projekt/webservice/crud/";

// DOM onload
document.addEventListener("DOMContentLoaded", function(){ 

//Get studies
table = "studies.php";
fetch(url + table)
.then((res) => res.json())
.then((data) => {

    let output = `<h2>Studier</h2>`;

    //loop throught the result
    data.forEach(function(studies){
        output += `
        <div class="mainboxes"> 
            <ul class="fa-ul">
                <li><i class="fa-li fas fa-graduation-cap"></i><span class="header3">${studies.educationName}</span></li>
                <li><i class="fa-li fas fa-school"></i><span class="header4">${studies.school}</span></li>
                <li><i class="fa-li far fa-calendar-alt"></i><span class="timestamp">${studies.startDate} - ${studies.endDate}</span></li>
            </ul>
        </div>
        `;
    });
    document.getElementById('mainArtTwo').innerHTML = output;
});

//Get works
table = "works.php";
fetch(url + table)
.then((res) => res.json())
.then((data) => {

    let output = `<h2>Arbeten</h2>`;

    //loop throught the result
    data.forEach(function(works){
        output += `
        <div class="mainboxes"> 
            <ul class="fa-ul">
                <li><i class="fa-li fas fa-briefcase"></i><span class="header3">${works.workTitle}</span></li>
                <li><i class="fa-li fas fa-map-marker-alt"></i><span class="header4">${works.workPlace}</span></li>
                <li><i class="fa-li far fa-calendar-alt"></i><span class="timestamp">${works.startDate} - ${works.endDate}</span></li>
            </ul>
        </div>
        `;
    });
    document.getElementById('mainArtThree').innerHTML = output;
});

//Get websites
table = "websites.php";

fetch(url + table)
.then((res) => res.json())
.then((data) => {

    let output = `<h2>Skapade webbsidor</h2>`;

    //loop throught the result
    data.forEach(function(websites){
        output += `
        <div class="mainboxes"> 
            <ul class="fa-ul">
                <li><i class="fa-li fas fa-globe"></i><span class="header3">${websites.siteTitle}</span></li>
                <li><i class="fa-li fas fa-link"></i><span class="header4"><a href="${websites.siteUrl}">Länk</a></span></li>
                <li><i class="fa-li far fa-calendar-alt"></i><span class="timestamp">${websites.createdDate}</span></li>
            </ul>
            <p class ="description">${websites.siteDescription}</p>
        </div>
        `;
    });
    document.getElementById('mainArtFour').innerHTML = output;
});


});