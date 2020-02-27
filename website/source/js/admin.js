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
            <div class="update-delete">
                <span class="updateStudy" data-id="${studies._id}"><i class="fas fa-edit"style="color:green;"></i></span>
                <span class="deleteStudy" data-id="${studies._id}"><i class="fas fa-times-circle"style="color:red;"></i></span>
            </div>
            <div id="updateStudie${studies._id}">
            </div>
        </div>
        `;
    })

    document.getElementById('mainArtTwo').innerHTML = output;

    //Delete study
    let deleteStudy = document.getElementsByClassName('deleteStudy');
    for (let i=0; i<deleteStudy.length; i++) {
        deleteStudy[i].addEventListener('click', function(){
            var id = this.dataset.id;
            //Lagrar id i en array
            let json = {'_id' : id};
            table = "studies.php";
            //Gör ett anrop till api:et med metoden DELETE och skickar med ett id i json-format.
            fetch(url + table, {
                method: 'DELETE',
                headers: new Headers(),
                body: JSON.stringify(json)
            }).then((res) => console.log(data))
            .catch((err) => console.log(err))

            location.reload();
        });
    }

    //Uppdate study
    let updateStudy = document.getElementsByClassName('updateStudy');
    for (let i=0; i<updateStudy.length; i++) {
        updateStudy[i].addEventListener('click', function(){
            let id = this.dataset.id;

            output = `
            <form class="add">
            <input type="text" name ="educationName" id ="educationName" placeholder="Program/kurs"/><br>
            <input type="text" name ="school" id ="school" placeholder="Skola"/><br>
            <input type="text" name ="startDate" id ="startDate" placeholder="Start(åååå/mm)"/>
            <input type="text" name ="endDate" id ="endDate" placeholder="Slut(åååå/mm)"/><br>
            <input type="submit" name="addStudie" value="Uppdatera" id="UpdateStudieButton" class="okButton" />
            </form>`

            document.getElementById('updateStudie' + id).innerHTML = output;

            UpdateStudieButton.addEventListener('click', updateStudyFunction)

            //UPDATE STUDIES
            function updateStudyFunction() {
            let educationName = document.getElementById("educationName").value;
            let school = document.getElementById("school").value;
            let startDate = document.getElementById("startDate").value;
            let endDate = document.getElementById("endDate").value;

            let json = {'_id': id,'school' : school, "educationName" : educationName, "startDate" : startDate, "endDate" : endDate};
            table = "studies.php";
            fetch(url + table, {
                method: 'PUT',
                headers: new Headers(),
                body: JSON.stringify(json)
                }).then((res) => console.log(data))
                .catch((err) => console.log(err))

                location.reload();
        }
        });
    }

});

/*Puts "AddStudieButton" in a variabel*/
const createStudie = document.getElementById("AddStudieButton");
createStudie.addEventListener('click', addStudyFunction)

//CREATE STUDIES
function addStudyFunction() {
    let educationName = document.getElementById("educationName").value;
    let school = document.getElementById("school").value;
    let startDate = document.getElementById("startDate").value;
    let endDate = document.getElementById("endDate").value;

    let json = {'school' : school, "educationName" : educationName, "startDate" : startDate, "endDate" : endDate};
    table = "studies.php";
    fetch(url + table, {
        method: 'POST',
        headers: new Headers(),
        body: JSON.stringify(json)
        }).then((res) => console.log(data))
        .catch((err) => console.log(err))

    location.reload();
}


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
            <div class="update-delete">
                <span class="updateWork" data-id="${works._id}"><i class="fas fa-edit"style="color:green;"></i></span>
                <span class="deleteWork" data-id="${works._id}"><i class="fas fa-times-circle"style="color:red;"></i></span>
            </div>
            <div id="updateWork${works._id}">
            </div>
        </div>
        `;
    })
    document.getElementById('mainArtThree').innerHTML = output;

    /*===DELETE WORK===*/
    let deleteWork = document.getElementsByClassName('deleteWork');
    for (let i=0; i<deleteWork.length; i++) {
        deleteWork[i].addEventListener('click', function(){
            var id = this.dataset.id;
            //Lagrar id i en array
            let json = {'_id' : id};
            table = "works.php";
            //Gör ett anrop till api:et med metoden DELETE och skickar med ett id i json-format.
            fetch(url + table, {
                method: 'DELETE',
                headers: new Headers(),
                body: JSON.stringify(json)
            }).then((res) => console.log(data))
            .catch((err) => console.log(err))

            location.reload();
        });
    }

    /*===UPDATE WORK===*/
    let updateWork = document.getElementsByClassName('updateWork');
    for (let i=0; i<updateWork.length; i++) {
        updateWork[i].addEventListener('click', function(){
            let id = this.dataset.id;

            output = `
            <form class="add">
            <input type="text" name ="workTitle" id ="workTitle" placeholder="Arbetstitel"/><br>
            <input type="text" name ="workPlace" id ="workPlace" placeholder="Arbetsplats"/><br>
            <input type="text" name ="startDateWork" id ="startDateWork" placeholder="Start(åååå/mm)"/>
            <input type="text" name ="endDateWork" id ="endDateWork" placeholder="Slut(åååå/mm)"/><br>
            <input type="submit" name="UpdateWorkButton" value="Uppdatera" id="UpdateWorkButton" class="okButton" />
            </form>`

            document.getElementById('updateWork' + id).innerHTML = output;

            const updateWork = document.getElementById("UpdateWorkButton");
            updateWork.addEventListener('click', updateWorkFunction);

            function updateWorkFunction() {
            let workTitle = document.getElementById("workTitle").value;
            let workPlace = document.getElementById("workPlace").value;
            let startDate = document.getElementById("startDateWork").value;
            let endDate = document.getElementById("endDateWork").value;

            let json = {'_id': id,'workTitle' : workTitle, "workPlace" : workPlace, "startDate" : startDate, "endDate" : endDate};
            table = "works.php";
            fetch(url + table, {
                method: 'PUT',
                headers: new Headers(),
                body: JSON.stringify(json)
                }).then((res) => console.log(data))
                .catch((err) => console.log(err))

                location.reload();
        }
        });
    }

});

/*Puts "AddWorkButton" in a variabel*/
const createWork = document.getElementById("AddWorkButton");
createWork.addEventListener('click', addWorkFunction)

/*===CREATE WORK===*/
function addWorkFunction() {
    let workTitle = document.getElementById("workTitle").value;
    let workPlace = document.getElementById("workPlace").value;
    let startDate = document.getElementById("startDateWork").value;
    let endDate = document.getElementById("endDateWork").value;


    let json = {'workTitle' : workTitle, "workPlace" : workPlace, "startDate" : startDate, "endDate" : endDate};
    table = "works.php";
    fetch(url + table, {
        method: 'POST',
        headers: new Headers(),
        body: JSON.stringify(json)
        }).then((res) => console.log(data))
        .catch((err) => console.log(err))

    location.reload();
}

/*===GET WEBSITES===*/
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
            <div class="update-delete">
                <span class="updateWebsite" data-id="${websites._id}"><i class="fas fa-edit"style="color:green;"></i></span>
                <span class="deleteWebsite" data-id="${websites._id}"><i class="fas fa-times-circle"style="color:red;"></i></span>
            </div>
            <div id="updateWebsite${websites._id}">
            </div>
        </div>
        `;
    })
    document.getElementById('mainArtFour').innerHTML = output;

    /*===DELETE WEBSITE===*/
    let deleteWebsite = document.getElementsByClassName('deleteWebsite');
    for (let i=0; i<deleteWebsite.length; i++) {
        deleteWebsite[i].addEventListener('click', function(){
            var id = this.dataset.id;
            //Lagrar id i en array
            let json = {'_id' : id};
            table = "websites.php";
            //Gör ett anrop till api:et med metoden DELETE och skickar med ett id i json-format.
            fetch(url + table, {
                method: 'DELETE',
                headers: new Headers(),
                body: JSON.stringify(json)
            }).then((res) => console.log(data))
            .catch((err) => console.log(err))

            location.reload();
        });

    /*===UPDATE WEBSITE===*/
    let updateWebsite = document.getElementsByClassName('updateWebsite');
    for (let i=0; i<updateWebsite.length; i++) {
        updateWebsite[i].addEventListener('click', function(){
            let id = this.dataset.id;

            output = `
            <form class="add">
            <input type="text" name ="siteTitle" id ="siteTitle" placeholder="Namn på webbplats"/><br>
            <input type="text" name ="siteUrl" id ="siteUrl" placeholder="Url"/><br>
            <input type="text" name ="createdDate" id ="createdDate" placeholder="Skapad(åååå/mm)"/>
            <textarea id="siteDescription" rows="4">Beskrivning av webbplatsen</textarea>
            <input type="submit" name="UpdateWebsiteButton" value="Uppdatera" id="UpdateWebsiteButton" class="okButton" />
            </form>`

            document.getElementById('updateWebsite' + id).innerHTML = output;

            const updateWebsiteButton = document.getElementById("UpdateWebsiteButton");
            updateWebsiteButton.addEventListener('click', updateWebsiteFunction)

            //UPDATE website
            function updateWebsiteFunction() {
            let siteTitle = document.getElementById("siteTitle").value;
            let siteUrl = document.getElementById("siteUrl").value;
            let createdDate = document.getElementById("createdDate").value;
            let siteDescription = document.getElementById("siteDescription").value;

            let json = {'_id': id,'siteTitle' : siteTitle, "siteUrl" : siteUrl, "createdDate" : createdDate, "siteDescription" : siteDescription};
            table = "websites.php";
            fetch(url + table, {
                method: 'PUT',
                headers: new Headers(),
                body: JSON.stringify(json)
                }).then((res) => console.log(data))
                .catch((err) => console.log(err))

                location.reload();
        }
        });
    }

    }

});

/*Puts "AddWebsiteButton" in a variabel*/
const createWebsite = document.getElementById("AddSiteButton");
createWebsite.addEventListener('click', addWebsiteFunction)

//CREATE Website
function addWebsiteFunction() {
    let siteTitle = document.getElementById("siteTitle").value;
    let siteUrl = document.getElementById("siteUrl").value;
    let createdDate = document.getElementById("createdDate").value;
    let siteDescription = document.getElementById("siteDescription").value;


    let json = {'siteTitle' : siteTitle, "siteUrl" : siteUrl, "createdDate" : createdDate, "siteDescription" : siteDescription};
    table = "websites.php";
    fetch(url + table, {
        method: 'POST',
        headers: new Headers(),
        body: JSON.stringify(json)
        }).then((res) => console.log(data))
        .catch((err) => console.log(err))

    location.reload();
}

});